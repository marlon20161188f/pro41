@extends('tenant.layouts.app')

@section('content')
    <tenant-proceso_prod-index :user="{{ json_encode(auth()->user()) }}"></tenant-proceso_prod-index>
@endsection
