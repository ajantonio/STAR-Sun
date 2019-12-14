@extends('permission::layouts.master')
@section('content_header')
    <h1>Permission</h1>
@stop
@section('content')
    <div class="card card-outline card-primary">
        {!! $builder->table() !!}
    </div>
@endsection

@push('js')
    {!! $builder->scripts() !!}
    <script>
        applyHeaderSearch('permissions');
    </script>
@endpush