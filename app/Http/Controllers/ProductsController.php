<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        return view('home', [
            'products' => $products
        ]);
    }

    public function products()
    {
        return view('products.products', [
            'products' => Product::all()
        ]);
    }

    public function show(Product $product)
    {
        //not using this anymore because implicit model binding on parameter function
        // $product = Product::findOrFail($product);
        return view('products.show', [
            'product' => $product,
        ]);
    }
}
