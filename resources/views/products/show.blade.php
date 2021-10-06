@extends('layouts.app')

@section('content')
    <h1>{{ $product->title }}</h1>
    <p>{{ $product->description }}</p>
    <p>{{ $product->price }}</p>
    <p>{{ $product->stock }}</p>
    <p>{{ $product->status }}</p>
    <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="btn btn-success">Edit</a>
@endsection
