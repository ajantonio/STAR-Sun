@extends('adminlte::master')

@inject('layoutHelper', \JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper)

@if($layoutHelper->isLayoutTopnavEnabled())
    @php( $def_container_class = 'container' )
@else
    @php( $def_container_class = 'container-fluid' )
@endif

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('body')
    <div class="wrapper">

        {{-- Top Navbar --}}
        @if($layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.navbar.navbar-layout-topnav')
        @else
            @include('adminlte::partials.navbar.navbar')
        @endif

        {{-- Left Main Sidebar --}}
        @if(!$layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.sidebar.left-sidebar')
        @endif

        {{-- Content Wrapper --}}
        <div class="content-wrapper {{ config('adminlte.classes_content_wrapper') ?? '' }}">

            {{-- Content Header --}}
            <div class="content-header">
                <div class="{{ config('adminlte.classes_content_header') ?: $def_container_class }}">
                    @yield('content_header')
                </div>
            </div>

            {{-- Main Content --}}
            <div class="content">
                <div class="{{ config('adminlte.classes_content') ?: $def_container_class }}">
                    @yield('content')
                </div>
            </div>

        </div>

        {{-- Footer --}}
        @hasSection('footer')
            @include('adminlte::partials.footer.footer')
        @endif

        <footer class="main-footer text-light">
            <!-- To the right -->
        {{-- <div class="float-right d-none d-sm-inline">
            <div class="icon-bar mr-5" style="font-size: 22px">
                <a href="https://www.facebook.com/asiapacificcollege.edu/" target="_blank"><i class="fab fa-facebook-square"></i></a>
                <a href="https://twitter.com/apcrams" target="_blank"><i class="fab fa-twitter-square"></i></a>
                <a href="https://www.instagram.com/apcrams" target="_blank"><i class="fab fa-instagram-square"></i></a>
                <a href="https://www.linkedin.com/school/asiapacificcollege/" target="_blank"><i class="fab fa-linkedin"></i></a>
            </div>
        </div> --}}
        <!-- Default to the left -->
            <strong>Copyright &copy; 2020 <a href="https://www.apc.edu.ph" target="_blank">Asia Pacific College</a>.</strong> All rights reserved.
        </footer>

        {{-- Right Control Sidebar --}}
        @if(config('adminlte.right_sidebar'))
            @include('adminlte::partials.sidebar.right-sidebar')
        @endif

    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
