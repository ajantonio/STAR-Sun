@extends('application::layouts.master')
@section('content_header')
    <h1>Applications</h1>
@stop
@section('content')
    <div class="card card-outline card-primary">
        {!! $builder->table() !!}
    </div>
@endsection

@push('js')
    {!! $builder->scripts() !!}
    <script>
        applyHeaderSearch('applications');
    </script>
@endpush
