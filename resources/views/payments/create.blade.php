@extends('layouts.app')

@section('content')
    <h1>Your Order</h1>

    <h4 class="text-center">Total : <strong>{{ $order->total }}</strong></h4>
    <form action="{{ route('orders.payments.store', ['order' => $order]) }}" method="POST" class="inline-block mb-3 text-center">
        @csrf
        <button type="submit" class="btn btn-success">Pay</button>
    </form>

@endsection
