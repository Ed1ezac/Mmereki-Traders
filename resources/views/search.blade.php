@extends('headers.landing-header')

@section('content')

<section>
    <!---Todo-->
    <div class="flex justify-center lg:justify-center sm:justify-end">
        <div class="p-8 lg:mt-32 mt-24">
            <form method="GET" action="{{ route('search.results') }}">
                <div class="py-4 bg-white max-w-sm lg:max-w-5xl rounded-sm shadow-md px-4">
                    <div class="flex flex-col items-center justify-center lg:flex-row gap-10">
                        <div class="w-80">
                            <input type="text" name="trader" class="my-form-input" placeholder="Trader e.g. plumber" required>
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
    </div>
</section>
@endsection

