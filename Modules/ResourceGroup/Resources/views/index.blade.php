@extends('resourcegroup::layouts.master')
@section('css')

@stop
@section('content')
    <div class="card card-outline card-primary">
        {!! $html->table() !!}
    </div>
@endsection

@push('js')
    {!! $html->scripts() !!}
    <script>

    </script>
@endpush