<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductViewController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('dashboard', compact('products'));
    }
    public function show($id) {
        $product = Product::findOrFail($id);
        return view('productdetail', compact('product'));
    }
}
