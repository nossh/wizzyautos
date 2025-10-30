<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PagesController extends Controller
{

    public function index()
    {
        return view('welcome', [
            'allProducts'    => Product::latest()->get(),          // all products
            'newArrivals'    => Product::orderBy('created_at', 'desc')->take(12)->get(), // last added
            'featured'       => Product::where('is_featured', true)->take(12)->get(),    // featured only
            'topSelling'     => Product::where('is_bestseller', true)->take(12)->get(), // by top selling
        ]);
    }

    
}
