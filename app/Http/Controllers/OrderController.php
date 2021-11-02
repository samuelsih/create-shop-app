<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\CartService;


class OrderController extends Controller
{
    public $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cart = $this->cartService->getFromCookie();

        if(! isset($cart) || $cart->products->isEmpty()) {
            return redirect()->back()
            ->withErrors('Your Cart is Empty');
        }

        return view('orders.create', [
            'cart' => $cart,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();
        // or $user = Auth::user();

        $order = $user->orders()->create([
            'status' => 'pending',
        ]);

        $cart = $this->cartService->getFromCookie();

        $cartProductsWithQuantity = $cart
            ->products
            ->mapWithKeys(function ($product) {
            $element[$product->id] = ['quantity' => $product->pivot->quantity];

            return $element;
        });

        // dd($cartProductsWithQuantity);

        $order->products()->attach($cartProductsWithQuantity->toArray());

        return redirect()->route('orders.payments.create', ['order' => $order->id]);

    }




}
