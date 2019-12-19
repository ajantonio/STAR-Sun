@extends('test::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('test.name'))}}</h1>
@stop
@section('content')
    <div class="card card-outline card-primary">
        {!! $builder->table() !!}
    </div>
@endsection

@push('js')
    {!! $builder->scripts() !!}
    <script>
        applyHeaderSearch('tests');
    </script>
@endpush
