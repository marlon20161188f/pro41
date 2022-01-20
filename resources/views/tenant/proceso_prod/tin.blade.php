@extends('tenant.layouts.app')

@section('content')

    <tenant-proceso_prod-tin
        :id="{{ json_encode($id) }}"
        
    ></tenant-proceso_prod-tin>

@endsection
