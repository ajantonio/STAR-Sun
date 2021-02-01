@extends('adminlte::master')

@php( $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home') )

@if (config('adminlte.use_route_url', false))
    @php( $dashboard_url = $dashboard_url ? route($dashboard_url) : '' )
@else
    @php( $dashboard_url = $dashboard_url ? url($dashboard_url) : '' )
@endif

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body'){{ ($auth_type ?? 'login') . '-page' }}@stop

@section('body')
    <div class="{{ $auth_type ?? 'login' }}-box" id="app">

        {{-- Logo --}}
        <div class="{{ $auth_type ?? 'login' }}-logo">
            <a href="{{ $dashboard_url }}">
                {{-- @if (config('adminlte.logo_img'))
                <img src="{{ asset(config('adminlte.logo_img')) }}" height="50">
                @endif --}}

                {{-- {!! config('adminlte.logo', '<b>Admin</b>LTE') !!} --}}
            </a>
        </div>

        {{-- Card Box --}}
        <div class="card {{ config('adminlte.classes_auth_card', 'card-outline') }}" style="width: 25rem;">

            {{-- Card Header --}}
            @hasSection('auth_header')
                <div class="card-header {{ config('adminlte.classes_auth_header', '') }} bg-apc-gold">                    
                    <div class="d-flex justify-content-center p-3">
                        <img src="{{ asset(config('adminlte.logo_img')) }}" width="120px">
                    </div>
                    
                    <div class="d-flex justify-content-center">
                        <h3><b>APC Information System</b></h3><br>                    
                    </div>
    
                    <div class="d-flex justify-content-center">                    
                        <h5>Login with <img src="{{ asset(config('adminlte.logo_img_365')) }}" width="82">  Account</h5>
                    </div>

                    {{-- <h3 class="card-title float-none text-center">
                        @yield('auth_header')
                    </h3> --}}
                </div>
            @endif

            {{-- Card Body --}}
            <div class="card-body {{ $auth_type ?? 'login' }}-card-body {{ config('adminlte.classes_auth_body', '') }}">
                @yield('auth_body')
            </div>

            {{-- Card Footer --}}
            @hasSection('auth_footer')
                <div class="card-footer {{ config('adminlte.classes_auth_footer', '') }}">
                    @yield('auth_footer')
                </div>
            @endif

        </div>

    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
