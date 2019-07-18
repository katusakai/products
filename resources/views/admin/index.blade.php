@extends('layouts/app')

@section('content')
    <admin-products-parent
            route-index="{{route('admin.products.index')}}"
            page="{{isset($_GET['page']) ? $_GET['page'] : 1}}"
    >
    </admin-products-parent>
@endsection