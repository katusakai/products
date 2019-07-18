@extends('layouts.app')

@section('content')
    <products-for-clients
            route-index="{{route('products.index')}}"
    ></products-for-clients>
@endsection
