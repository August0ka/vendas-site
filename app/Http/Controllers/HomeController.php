<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($categoryId = null) {

        if($categoryId) {
            $products = Product::where('category_id', $categoryId)
                ->where('quantity', '>', 0)
                ->get();
           
        } else {
            $products = Product::where('quantity', '>', 0)->get();    
        }

        $categories = Category::all();

        return view('site.home.index', compact('products', 'categories'));
    }

    public function showProduct(Product $product) {

        $productImages = ProductImage::where('product_id', $product->id)->get();
        $categories = Category::all();

        return view('site.product.index', compact('product', 'categories', 'productImages'));
    }
}
