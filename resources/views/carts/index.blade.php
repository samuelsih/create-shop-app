@extends('layouts.app')

@section('content')

<h1>Your Cart</h1>

@if(! isset($cart) || $cart->products->isEmpty())
    <div class="alert alert-warning">
        Your Cart is Empty
    </div>

@else
<div class="row">
    <div class="container-fluid">
        <a href="{{ route('orders.create') }}" class="btn btn-success mb-4">Order Now</a>
        <div class="row justify-content-center">
            @foreach ($cart->products as $product)
                <div class="col-3">
                    @include('components.product-card')
                </div>
            @endforeach
        </div>
    </div>
</div>

@endif



@endsection
