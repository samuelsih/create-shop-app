<?php

namespace App\Services;

use Illuminate\Support\Facades\Cookie;
use App\Models\Cart;

class CartService
{
    protected $cookieName = 'cart';
    protected $cookieTime = 7 * 24 * 60;

    //create third
    public function getFromCookie()
    {
        $cartId = Cookie::get($this->cookieName);

        return Cart::find($cartId);
    }

    //create first
    public function getFromCookieOrCreate()
    {
        $cartId = Cookie::get($this->cookieName);

        $cart = Cart::find($cartId);

        return $cart ?? Cart::create();
    }

    //create second
    public function makeCookie(Cart $cart)
    {
        return Cookie::make($this->cookieName, $cart->id, $this->cookieTime);
    }

    public function countProducts()
    {
        $cart = $this->getFromCookie();

        if($cart != null) {
            // dapatkan data quantity per item
            // lalu saat semua didapatkan, jumlahkan semua quantity per item nya
            return $cart->products->pluck('pivot.quantity')->sum();
        }

        return 0;
    }

}

?>
