@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create a Product</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-row">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
        </div>

        <div class="form-row">
            <label for="description">Description</label>
            <input type="text" name="description" class="form-control" required value="{{ old('description') }}">
        </div>

        <div class="form-row">
            <label for="price">Price</label>
            <input type="number" min="1.00" step="0.01" name="price" class="form-control" required value="{{ old('price') }}">
        </div>

        <div class="form-row">
            <label for="stock">Stock</label>
            <input type="number" min="1" name="stock" class="form-control" required value="{{ old('stock') }}">
        </div>

        <div class="form-row">
            <label for="title">Status</label>
            <select name="status" class="custom-select" required>
                <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                <option value="unavailable" {{ old('status') == 'unavailable' ? 'selected' : '' }}>Unavailable</option>
            </select>
        </div>

        <div class="form-row">
            <button type="submit" class="btn btn-primary mt-4">Add Product</button>
        </div>
    </form>
</div>
@endsection
