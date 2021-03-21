@extends('layouts/app')

@section('content')
    <configs
        route-index-json="{{route('admin.config.indexJson')}}"
        route-configs-update="{{route('admin.configs.update')}}"
    ></configs>
@endsection