@extends('role::layouts.master')
@section('content_header')
    <h1>Role</h1>
@stop
@section('content')
    <div class="card card-outline card-primary">
        {!! $builder->table() !!}
    </div>
@endsection

@push('js')
    {!! $builder->scripts() !!}
    <script>
        applyHeaderSearch('roles');
    </script>
@endpush