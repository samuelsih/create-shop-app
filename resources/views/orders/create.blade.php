@extends('layouts.app')

@section('content')
    <h1>Your Order</h1>
    <a href="{{ route('products.create') }}" class="btn btn-success mb-4">Order Now</a>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    @foreach($cart->products as $product)
                    <tr>
                        <td>
                            <img src="{{ asset($product->images->first()->path) }}" width="100">
                        </td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>{{ $product->pivot->quantity * $product->price }}</td>
                    </tr>
                    @endforeach
                </tr>
            </tbody>
    </div>

@endsection
