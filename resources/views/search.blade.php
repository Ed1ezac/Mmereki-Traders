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
                            <button type="submit" class="bg-gray-700 px-4 py-2 rounded w-full text-white">Search</button>
                        </div>
                    </div>
                </div> 
            </form>
        </div>
        <div class="flex my-8 lg:mt-24">
        <a class="text-gray-800 text-lg font-medium mr-16 hover:underline" href="/terms">
                Terms
            </a>
            <a class="text-gray-800 text-lg font-semibold hover:underline" href="/about">
                How does it work?
            </a>
            <a class="text-gray-800 text-lg font-medium ml-16 hover:underline" href="/privacy-policy">
                Privacy Policy
            </a>
        </div>
    </div>
</section>
@endsection

