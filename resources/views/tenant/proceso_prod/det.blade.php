@extends('tenant.layouts.app')

@section('content')

    <tenant-proceso_prod-det
        :id="{{ json_encode($id) }}"
        
    ></tenant-proceso_prod-det>

@endsection
