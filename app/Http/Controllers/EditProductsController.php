<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class EditProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(Product $product)
    {
        return view('products.edit', [
            //not using this Product::findOrFail anymore because implicit model binding on parameter function
            'product' => $product,
        ]);
    }

    public function update(Product $product, ProductRequest $request)
    {
        $product->update($request->validated());

        return redirect('products')
                ->withSuccess("Product {$product->title} has been updated");
    }
}
