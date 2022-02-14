@extends('tenant.layouts.app')

@section('content')

    <tenant-proceso_prod-form
        :id="{{ json_encode($id) }}"
        :type-user="{{json_encode(Auth::user()->type)}}"
        :configuration="{{\App\Models\Tenant\Configuration::getPublicConfig()}}"
    ></tenant-proceso_prod-form>

@endsection
