@extends('layouts/app')

@section('content')
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-8">--}}
{{--                <admin-products-table-component--}}
{{--                        route-index="{{route('admin.products.index')}}"--}}
{{--                        page="{{isset($_GET['page']) ? $_GET['page'] : 1}}"--}}
{{--                >--}}
{{--                </admin-products-table-component>--}}
{{--            </div>--}}
{{--            <div class="col-md-4">--}}
{{--                <admin-product-component></admin-product-component>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <admin-products-parent
            route-index="{{route('admin.products.index')}}"
            page="{{isset($_GET['page']) ? $_GET['page'] : 1}}"
    >
    </admin-products-parent>
@endsection