@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit a Product</h1>
    <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-row">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control"  value="{{ old('title') ?? $product->title }}" required>
        </div>

        <div class="form-row">
            <label for="description">Description</label>
            <input type="text" name="description" class="form-control"  value="{{ old('description') ?? $product->description }}" required>
        </div>

        <div class="form-row">
            <label for="price">Price</label>
            <input type="number" min="1.00" step="0.01" name="price" class="form-control"  value="{{ old('price') ?? $product->price }}" required>
        </div>

        <div class="form-row">
            <label for="stock">Stock</label>
            <input type="number" min="1" name="stock" class="form-control"  value="{{ old('stock') ?? $product->stock }}" required>
        </div>

        <div class="form-row">
            <label for="title">Status</label>
            <select name="status" class="custom-select"  required>
                <option value="available" {{ old('status') ?? ($product->status == 'available' ? 'selected' : '') }}>Available</option>
                <option value="unavailable" {{ old('status') ?? ($product->status == 'unavailable' ? 'selected' : '') }}>Unavailable</option>
            </select>
        </div>

        <div class="form-row">
            <button type="submit" class="btn btn-primary mt-4">Add Product</button>
        </div>
    </form>
</div>
@endsection
