@extends('tenant.layouts.app')

@section('content')

    <tenant-proceso_prod-det
    :id="{{ json_encode($id) }}"
        :type-user="{{json_encode(Auth::user()->type)}}"
        :configuration="{{\App\Models\Tenant\Configuration::getPublicConfig()}}"
    ></tenant-proceso_prod-det>

@endsection
