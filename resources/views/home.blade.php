@extends('layouts.app')

@section('content')

<div class="row">
    @foreach($products as $product)
        <div class="col-3">
            @include('components.product-card')
        </div>
    @endforeach
</div>

@endsection
