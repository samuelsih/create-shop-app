<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DeleteProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function destroy(Product $product)
    {
        //not using this anymore because implicit model binding on parameter function
        // $product = Product::findOrFail($product);
        $product->delete();

        return redirect()
                ->route('products')
                ->withSuccess("Product {$product->title} has been removed");
    }
}
