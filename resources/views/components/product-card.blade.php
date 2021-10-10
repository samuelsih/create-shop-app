<div class="card">
    <img src="{{ asset($product->images->first()->path) }}" height="400">
    <div class="card-body">
        <h4 class="text-right"><strong>${{ $product->price }}</strong></h1>
        <h5>{{ $product->description }}</h5>
        <p>{{ $product->stock }}</p>
        <p>{{ $product->status }}</p>

        <form action="{{ route('products.carts.store', ['product' => $product->id]) }}" method="POST" class="inline-block">
            @csrf
            <button type="submit" class="btn btn-success">Add to Cart</button>
        </form>

    </div>
</div>

