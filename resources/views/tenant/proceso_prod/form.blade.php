@extends('tenant.layouts.app')

@section('content')

    <tenant-proceso_prod-form
        :id="{{ json_encode($id) }}"
        
    ></tenant-proceso_prod-form>

@endsection
