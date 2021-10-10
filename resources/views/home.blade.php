@extends('layouts.app')

@section('content')

<div class="row">
    <div class="container-fluid">
        <div class="row justify-content-center">
            @foreach ($products as $product)
                <div class="col-3">
                    @include('components.product-card')
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
