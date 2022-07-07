@extends('layouts.landing-header')

@section('content')
    <main class="px-8 sm:px-16 2xl:px-0 max-w-7xl 2xl:mx-auto">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <error-banner v-bind:disappears="true" error="{{$error}}"></error-banner>                 
            @endforeach
        @endif
        @if(session('status'))
            <status-banner message="{{ session('status') }}"></status-banner>
        @endif

        @yield('features')
    </main>
@endsection