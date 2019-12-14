@extends('permission::layouts.master')
@section('content_header')
    <h1>Permission</h1>
@stop
@section('content')
    <div class="card card-outline card-primary">
        {!! $html->table() !!}
    </div>
@endsection

@push('js')
    {!! $html->scripts() !!}
    <script>
        applyHeaderSearch('permission');
    </script>
@endpush