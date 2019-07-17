@extends('layouts/app')

@section('content')
    <admin-product-page route-product-show="{{route('admin.product.show.json', ['product' => $product])}}"></admin-product-page>
@endsection