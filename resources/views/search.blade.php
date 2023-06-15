@extends('layouts.landing-header')

@push('page-css')
    <style>
        .hero{
            margin-top: -3rem;
            background-position: center;
            background-repeat: no-repeat;
            background-image: url("word-cloud.svg");
        }
    </style>
@endpush

@section('content')
<section class="hero">
    <div class="flex flex-col items-center">
        <h2 class="text-center text-primary-500 font-bold text-5xl mt-20 sm:mt-18 px-8 sm:px-0">Search for Tradespeople</h2>
        <p class="text-center font-semibold text-2xl max-w-xs sm:max-w-full text-primary-400 mt-10">Find verified workers near you for all your trades needs</p>
        <div class="p-8 lg:mt-16 mt-8">
            <form method="GET" action="{{ route('search.results') }}">
                <div class="py-4 bg-white border border-gray-200 max-w-sm lg:max-w-5xl rounded-sm shadow-md px-4">
                    <div class="flex flex-col items-center justify-center lg:flex-row gap-10">
                        <div class="w-80">
                            <input type="text" name="trader" class="my-form-input" placeholder="Trade e.g. plumber" required>
                        </div>
                        <div class="w-80">
                            <input type="text" name="location" class="my-form-input" placeholder="Location, e.g. Gaborone" required>
                        </div>
                        <div class="flex w-80">
                            <button type="submit" class="px-4 py-2 group rounded w-full my-btn">
                                <span class="mr-3 flex items-center">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                Search    
                            </button>
                        </div>
                    </div>
                </div> 
            </form>
        </div>
        <div class="flex justify-center mx-4 my-8 lg:mt-24">
            <a class="inline-flex items-center my-link group no-underline text-lg font-medium mr-7 sm:mr-16 hover:underline" href="/terms">
                <span class="mr-2.5 flex items-center">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                </span>
                Terms of Service
            </a>
            <a class="inline-flex items-center my-link text-lg font-semibold" href="/about">
                <span class="mr-2.5 flex items-center">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                    </svg>

                </span>
                How does it work?
            </a>
            <a class="inline-flex items-center my-link no-underline text-lg font-medium ml-7 sm:ml-16 hover:underline" href="/privacy-policy">
                <span class="mr-2.5 flex items-center">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                    </svg>
                </span>
                Privacy Policy
            </a>
        </div>
    </div>
</section>

@endsection

