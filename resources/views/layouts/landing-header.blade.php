<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ config('app.name', 'Mmereki-Tradesmen') }}</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Favicons-->
        <link rel="shortcut icon" type="image/png" href="{{ asset('icon/icon-32.png') }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('icon/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('icon/apple-icon-60.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('icon/apple-icon-76.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('icon/apple-icon-120.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('icon/apple-icon-152.png') }}">

        @stack('page-css')
    </head>
    <body class="bg-gray-50 font-body">
        <div id="app">
            @if(Auth::check())
            <navbar
                email="{{ Auth::user()->email }}"
                username="{{ Auth::user()->name }}"
                current-url="{{ Request::segment(1) }}"
                initials ="{{ Auth::user()->initials }}"
                company="{{ Auth::user()->company->name }}"
                v-bind:is-admin="{{ json_encode(
                Auth::check() ?
                    Auth::user()->hasRole('Administrator')
                    : false
                ) }}"
                v-bind:is-auth="{{ json_encode(Auth::check()) }}"
                logo-uri="{{ Request::segment(1) == '' ? asset('logo-gr.png') : asset('logo.png')  }}">
            </navbar>    
            @else
            <navbar
                current-url="{{ Request::segment(1) }}"
                v-bind:is-auth="{{ json_encode(Auth::check()) }}"
                logo-uri="{{ Request::segment(1) == '' ? asset('logo-gr.png') : asset('logo.png') }}">
            </navbar>
            @endif
            <main class="pt-20">
                @yield('content')
            </main>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
        @stack('page-js')
    </body>
</html>