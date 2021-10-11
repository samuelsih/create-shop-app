<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        $cart = $this->cartService->getFromCookieOrCreate();
        return view('carts.index', [
            'cart' => $cart,
        ]);
    }


}
