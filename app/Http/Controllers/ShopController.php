<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(12);
        $featuredProducts = Product::where('is_featured', true)
        ->take(3)
        ->get();

        return view('pages/shop', compact('products', 'featuredProducts'));
    }

    public function show(Product $product)
    {
        return view('pages/product-detail', compact('product'));
    }
}
