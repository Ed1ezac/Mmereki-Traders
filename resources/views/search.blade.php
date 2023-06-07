@extends('layouts.landing-header')

@section('content')

<section>
    <!---Todo-->
    <div class="flex flex-col items-center">
        <h2 class="text-center text-gray-900 font-semibold text-5xl mt-20 px-8 sm:mt-14 sm:px-0">Search for Tradespeople</h2>
        <div class="p-8 lg:mt-24 mt-14">
            <form method="GET" action="{{ route('search.results') }}">
                <div class="py-4 bg-white max-w-sm lg:max-w-5xl rounded-sm shadow-md px-4">
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
            <a class="my-link no-underline text-lg font-medium mr-7 sm:mr-16 hover:underline" href="/terms">
                Terms of Service
            </a>
            <a class="my-link text-lg font-semibold" href="/about">
                How does it work?
            </a>
            <a class="my-link no-underline text-lg font-medium ml-7 sm:ml-16 hover:underline" href="/privacy-policy">
                Privacy Policy
            </a>
        </div>
    </div>
</section>

@endsection

