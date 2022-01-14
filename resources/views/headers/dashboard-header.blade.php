@extends('headers.landing-header')

@section('content')
    @include('components.sidebar')
    <main class="pl-8 sm:pl-56 xl:pl-60 pr-6">
        @yield('features')
    </main>

@endsection