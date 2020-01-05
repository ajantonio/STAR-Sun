@extends('passport::layouts.master')
@section('content_header')
    <h1><i class="fas fa-list"></i> Laravel {{plural(config('passport.name'))}}</h1>
@stop
@section('content')
    <passport-clients></passport-clients>
    <passport-authorized-clients></passport-authorized-clients>
    <passport-personal-access-tokens></passport-personal-access-tokens>
@endsection

@push('js')
    <script>
        new Vue({
            el:'.content'
        });
    </script>
@endpush
