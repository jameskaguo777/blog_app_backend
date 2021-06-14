<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }} | {{ config('app.name', 'Laravel') }} </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Toggles CSS -->
    <link href="{{ asset('assets/vendors/jquery-toggles/css/toggles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/vendors/jquery-toggles/css/themes/toggles-light.css') }}" rel="stylesheet"
        type="text/css">

    <!-- Custom CSS -->
    <link href="{{ asset('assets/dist/css/style.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="app">

        <div class="hk-wrapper hk-vertical-nav">
            @auth
                @include('layouts.topbar')
                @include('layouts.sidebar')
                
                <div class="hk-pg-wrapper">
                    @yield('breadcrumb')
                <div class="container mt-xl-50 mt-sm-30 mt-15">
                    @yield('content')
                </div>
                
            </div>
            @endauth
            @guest
                @yield('content')
            @endguest
            
        </div>


    </div>
    
    <!-- jQuery -->
    <script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('assets/vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Slimscroll JavaScript -->
    <script src="{{ asset('assets/dist/js/jquery.slimscroll.js') }}"></script>

    <!-- Fancy Dropdown JS -->
    <script src="{{ asset('assets/dist/js/dropdown-bootstrap-extended.js') }}"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="{{ asset('assets/dist/js/feather.min.js') }}"></script>
    @stack('js')
    <!-- Toggles JavaScript -->
    <script src="{{ asset('assets/vendors/jquery-toggles/toggles.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/toggle-data.js') }}"></script>

    <!-- Init JavaScript -->
    <script src="{{ asset('assets/dist/js/init.js') }}"></script>
</body>

</html>
