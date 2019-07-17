@extends('layouts/app')

@section('content')
    <admin-product-page
            route-product-show="{{route('admin.product.show.json', ['product' => $product])}}"
            route-product-update="{{route('admin.product.update', ['id' => 1])}}"
    ></admin-product-page>
@endsection