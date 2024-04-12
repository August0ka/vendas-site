<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

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

}
