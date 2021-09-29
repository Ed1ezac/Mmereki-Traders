<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ config('app.name', 'Mmereki-Traders') }}</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        @stack('page-css')
    </head>
    <body>
        <div id="app">
            <!--- navbar -->
            @yield('content')
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
        @stack('page-js')
    </body>
</html>