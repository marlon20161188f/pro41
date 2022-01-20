@extends('tenant.layouts.app')

@section('content')

    <tenant-proceso_prod-import
        :id="{{ json_encode($id) }}"
        
    ></tenant-proceso_prod-import>

@endsection
