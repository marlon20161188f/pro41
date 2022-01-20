@extends('tenant.layouts.app')

@section('content')

    <tenant-proceso_prod-tej
        :id="{{ json_encode($id) }}"
        
    ></tenant-proceso_prod-tej>

@endsection
