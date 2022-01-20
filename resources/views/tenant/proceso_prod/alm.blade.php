@extends('tenant.layouts.app')

@section('content')

    <tenant-proceso_prod-alm
        :id="{{ json_encode($id) }}"
        
    ></tenant-proceso_prod-alm>

@endsection
