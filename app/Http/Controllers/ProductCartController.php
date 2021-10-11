<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ProductCartController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function store(Request $request, Product $product)
    {
        // dd('success');

        $cart = $this->cartService->getFromCookieOrCreate();

        $quantity = $cart->products()
        ->find($product->id)
        ->pivot
        ->quantity ?? 0;

        $cart->products()->syncWithoutDetaching([
            $product->id => ['quantity' => $quantity + 1],
        ]);

        //cookie akan bertahan selama 7 x 24 jam
        $cookie = Cookie::make('cart', $cart->id, 7 * 24 * 60);

        return redirect()->back()->cookie($cookie);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Cart $cart)
    {
        //
    }
}
