@extends('layouts.app')

@section('content')
    <h1>Your Order</h1>

    <h4 class="text-center">Total : <strong>{{ $cart->total }}</strong></h4>
    <form action="{{ route('orders.store') }}" method="POST" class="inline-block mb-3 text-center">
        @csrf
        <button type="submit" class="btn btn-success">Confirm Order</button>
    </form>

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

                        {{-- Gunakan method getTotalAttribute dari Model product --}}
                        <td>{{ $product->total }}</td>

                        {{-- <td>{{ $product->pivot->quantity * $product->price }}</td> --}}
                    </tr>
                    @endforeach
                </tr>
            </tbody>
    </div>

@endsection
