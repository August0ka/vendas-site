<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id')->get();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('admin.products.form', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        if ($data['price']) {
            $data['price'] = str_replace('.', '', $data['price']);
            $data['price'] = str_replace(',', '.', $data['price']);
        }

        if ($request->hasFile('main_image')) {
            $randomize = rand(111111, 999999);
            $extension = $request->file('main_image')->getClientOriginalExtension();
            $filename = $randomize . '.' . $extension;
            Storage::disk('public')->put('images/' . $filename, file_get_contents($request->file('main_image')));
            $data['main_image'] = $filename;

        }

        $product = Product::create($data);

        if($request->hasFile('multiple_images')) {
            
            $multipleImages = $data['multiple_images'];

            foreach ($multipleImages as $image) {
                $randomize = rand(111111, 999999);
                $extension = $image->getClientOriginalExtension();
                $filename = $randomize . '.' . $extension;
                Storage::disk('public')->put('images/' . $filename, file_get_contents($image));
                
                ProductImage::create([
                    'product_id' => $product->id,
                    'image'      => $filename
                ]);
            }
        }


        return redirect()->route('products.index')->with('success', 'Produto criado com sucesso!');

    }

    public function edit(Product $product)
    {
        $productImages = ProductImage::where('product_id', $product->id)->pluck('image', 'id');
        $categories = Category::pluck('name', 'id');

        return view('admin.products.form', compact('product', 'categories', 'productImages'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->except('_token', '_method');

        if ($data['price']) {
            $data['price'] = str_replace('.', '', $data['price']);
            $data['price'] = str_replace(',', '.', $data['price']);
        }

        if ($request->hasFile('main_image')) {
            $randomize = rand(111111, 999999);
            $extension = $request->file('main_image')->getClientOriginalExtension();
            $filename = $randomize . '.' . $extension;
            Storage::disk('public')->put('images/' . $filename, file_get_contents($request->file('main_image')));
            $data['main_image'] = $filename;

        }

        if($request->hasFile('multiple_images')) {
            ProductImage::where('product_id', $product->id)->delete();

            $multipleImages = $data['multiple_images'];

            foreach ($multipleImages as $image) {
                $randomize = rand(111111, 999999);
                $extension = $image->getClientOriginalExtension();
                $filename = $randomize . '.' . $extension;
                Storage::disk('public')->put('images/' . $filename, file_get_contents($image));
                
                ProductImage::create([
                    'product_id' => $product->id,
                    'image'      => $filename
                ]);
            }
        }


        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso!');

    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produto deletado com sucesso!');
    }

    public function purchase(Product $product) {

        $categories = Category::all();

        $user = Auth::user();

        return view('site.product.purchase', compact('product', 'categories', 'user'));
    }

    public function finalizePurchase( Product $product, Request $request) {
        $purchaseDetails = $request->except('_token');

        $productQuantity = Product::find($product->id)->quantity;

        if($productQuantity < $purchaseDetails['quantity']) {
            return back()->withErrors(['error' => 'Quantidade indisponível em estoque!']);
        }
        
        Product::find($product->id)->decrement('quantity', $purchaseDetails['quantity']);

        if($purchaseDetails['total']) {
            $purchaseDetails['total'] = str_replace('R$', '', $purchaseDetails['total']);
            $purchaseDetails['total'] = str_replace(',', '.', $purchaseDetails['total']);
        }
        
        $categories = Category::all();

        Sale::create([
            'user_id'    => Auth::user()->id,
            'product_id' => $product->id,
            'quantity'   => $purchaseDetails['quantity'],
            'total'      => $purchaseDetails['total'],
        ]);


        return view('site.product.confirmPurchase', compact('categories'));
    }

}
