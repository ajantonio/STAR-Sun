@extends('educationlevel::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> {{plural(config('educationlevel.name'))}}</h1>
@stop
@section('content')
    <div class="card card-outline card-primary">
        {!! $builder->table() !!}
    </div>
@endsection

@push('js')
    {!! $builder->scripts() !!}
    <script>
        applyHeaderSearch('educationlevels');
    </script>
@endpush
