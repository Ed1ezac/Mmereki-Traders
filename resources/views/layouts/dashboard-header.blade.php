@extends('layouts.landing-header')

@section('content')
    <main class="">
        <div class="my-section">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <error-banner v-bind:disappears="true" error="{{$error}}"></error-banner>                 
            @endforeach
        @endif
        @if(session('status'))
            <status-banner message="{{ session('status') }}"></status-banner>
        @endif
        </div>

        @yield('features')
    </main>
@endsection