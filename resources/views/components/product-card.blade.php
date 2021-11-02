<div class="card">
    <img src="{{ asset($product->images->first()->path) }}" height="400">

    <div class="card-body">
        <h4 class="text-right"><strong>${{ $product->price }}</strong></h1>
        <h5 class="card-title">{{ $product->description }}</h5>
        <p class="card-text"><b>{{ $product->stock }} left</b></p>
        <p class="card-text"><strong>{{ $product->status }}</strong></p>

        @if(isset($cart))
        <p class="card-text">
            {{ $product->pivot->quantity }} in your cart <strong>({{ $product->total }})</strong>
        </p>

        <form action="{{ route('products.carts.destroy', ['product' => $product->id, 'cart' => $cart->id]) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-warning">Remove from cart</button>
        </form>

        @else
        <form action="{{ route('products.carts.store', ['product' => $product->id]) }}" method="POST" class="inline-block">
            @csrf
            <button type="submit" class="btn btn-success">Add to Cart</button>
        </form>

        @endif
    </div>


</div>

