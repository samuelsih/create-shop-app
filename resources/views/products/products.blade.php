@extends('layouts.app')

@section('content')
    <h1>List of Products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-success mb-4">Create Product</a>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Stock</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->status }}</td>
                    <td>
                        <a href="{{ route('products.show', ['product' => $product->id]) }}" class="btn btn-primary">Show</a>
                        <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="btn btn-primary">Edit</a>
                        <form class="d-inline" method="POST" action="{{ route('products.destroy', ['product' => $product->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tr>
        </tbody>
@endsection
