<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="120" />
    {{--  <meta name="keywords" content="">  --}}
    <meta name="author" content="Satriawan Nawairtas">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{--  font-awesome --}}
    <link rel="stylesheet" href="{{asset('font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{asset('fontawesome_611/css/all.min.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <!-- jquery -->
    <script type="text/javascript" src="{{ asset ('jquery-3.6.0.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset ('js/main.js') }}" defer></script>
    @stack('page-scripts')

    <link rel="shortcut icon" href="{{ asset ('favicon_io/android-chrome-192x192.png') }}" type="image/x-icon">
</head>
<body>
    <div class="wrapper" id="app">
        <div class="wrapper-header">
            @include('layouts.header')
            @include('layouts.navslide')
            @include('layouts.navbottom')
        </div>

        <div class="wrapper-content">
            @yield('content')
        </div>
    </div>


</body>

</html>
