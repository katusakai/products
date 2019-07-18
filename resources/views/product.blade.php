@extends('layouts.app')

@section('content')
    <product-page-for-clients
        route-product="{{route('product.show.json', ['product' => $product->id])}}"
    ></product-page-for-clients>
@endsection
