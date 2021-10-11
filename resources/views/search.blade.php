@extends('headers.landing-header')

@section('content')


<div class="mx-8 mt-28">
    <form method="post" action="/search">
        @csrf
        <div class="py-4 bg-white rounded-sm shadow px-4">
            <div class="flex flex-row align-content-center gap-12">

                <div class="justify-center">
                    <input type="text" name="trade" class="bg-gray-300 w-80" placeholder="Trader e.g. plumber">
                </div>

                <div class="col-span-12 sm:col-span-3">
                    <input type="text" name="location" class="bg-gray-300 w-80" placeholder="Region, e.g. Location">
                </div>

                <div class="">
                    <button type="submit" class="bg-gray-700 px-4 py-2 rounded sm:w-64 w-80 text-white">Search</button>
                </div>
            </div>
        </div>
        <div class="mt-10 bg-yellow-300 shadow p-8"></div>        
    </form>
</div>
@endsection

