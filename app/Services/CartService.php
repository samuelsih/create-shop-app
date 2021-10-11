<?php

namespace App\Services;

use Illuminate\Support\Facades\Cookie;
use App\Models\Cart;

class CartService
{
    public function getFromCookieOrCreate()
    {
        $cartId = Cookie::get('cart');

        $cart = Cart::find($cartId);

        return $cart ?? Cart::create();
    }
}



?>
