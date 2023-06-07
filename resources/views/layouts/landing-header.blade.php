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
    <body class="bg-gray-100">
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