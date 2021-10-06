@extends('layouts.app')

@section('content')
    <div class="col-4">
        @include('components.product-card')
    </div>
    <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="btn btn-success">Edit</a>
@endsection
