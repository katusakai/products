@extends('layouts/app')

@section('content')
    <admin-product-page
            route-product-show="{{route('admin.product.show.json', ['product' => $product])}}"
            route-product-update="{{route('admin.product.update', ['id' => $product->id])}}"
            route-product-destroy="{{route('admin.product.destroy', ['id' => $product->id])}}"
            route-redirect="{{route('admin.products')}}"
            route-image-upload="{{route('admin.image.store', ['product' => $product->id])}}"
    ></admin-product-page>
@endsection