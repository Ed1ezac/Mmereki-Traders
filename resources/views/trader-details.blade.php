@extends('layouts.landing-header')

@section('content')
<section>
    <div class="sm:h-80 bg-primary-600 -mt-4 z-0 px-16">
        <!---Background Image HERE--->
        <div class="flex items-end pb-10 h-full max-w-7xl 2xl:mx-auto">
            <div class="flex flex-col items-start pt-14 sm:pt-0 sm:flex-row">
                <div class="border-primary-800 border-2 bg-gray-100 shadow flex-shrink-0">
                    @if ($company->logo === null)
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-primary-700 w-32 h-32" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    @else
                        <img class="object-cover w-32 h-32" 
                            src="{{ url('storage/'.$company->logo) }}" 
                        alt="trade logo">
                    @endif
                </div>
                <div class="flex flex-col justify-center space-y-2 sm:mx-8">
                    <div class="flex flex-wrap">
                        <h3 class="text-3xl font-semibold text-white mr-6 mb-1">{{ $company->name }}</h3>
                        @if($company->verification == 'verified')
                        <div class="inline-flex items-center px-2 py-1.5 rounded-full bg-primary-200">
                            <svg class="w-6 h-6 text-primary-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                            </svg>
                            <p class="ml-1 text-xs text-primary-500 font-bold">Verified Member</p>
                        </div>
                        @endif
                    </div>
                    
                    <div class="flex items-center">
                        <svg class="text-primary-300 h-6 w-6 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                        <h5 class="text-xl text-white">{{ $company->location }}</h5>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row text-sm space-y-2 sm:space-y-0 sm:space-x-4 space-x-0">
                        <div class="flex text-base flex-1 py-1 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-primary-300 h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg> 
                            {{$company->telephone}}
                        </div>
                        <div class="flex text-base py-1 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-primary-300 h-6 w-6 mr-1 sm:mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                            {{$company->mobile}}
                        </div>
                        <div class="flex text-base py-1 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-primary-300 h-6 w-6 mr-1 sm:mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>  
                            {{$company->email}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="my-8 max-w-7xl 2xl:mx-auto md:grid md:grid-cols-3 md:gap-4">
    <div class="flex flex-col md:col-span-2">
        <div class="bg-white mx-8 sm:mx-16 2xl:mx-0 p-4 rounded shadow">
            <h3 class="text-gray-800 font-semibold text-base">Intro</h3>
            <p class="my-2">{{ $company->intro }}</p>
        </div>

        <div class="bg-white mt-8 mx-8 sm:mx-16 2xl:mx-0 p-4 rounded shadow">
            <h3 class="text-gray-800 font-semibold text-base">About</h3>
            <pre class="font-body whitespace-pre-wrap my-2">{{ $company->about }}</pre>
        </div>
    </div>
    <div class="col-span-1 mx-8 sm:mx-16 md:mx-0 md:mr-4 mt-8 md:mt-0">
        <div class="border-t-4 border-gray-400 p-4">
            <h3 class="text-gray-800 font-semibold text-base">Address</h3>
            <p class="my-2">{{ $company->address }}</p>
        </div>
        <div class="border-t-4 mt-8 md:mt-12 border-gray-400 p-4">
            <h3 class="text-gray-800 font-semibold text-base">Trades</h3>
            <div class="flex flex-wrap space-x-2 my-2">
                @foreach ($company->trades as $trade )
                    <div class="bg-orange-200 text-sm text-orange-600 font-semibold rounded-full py-1 mb-2 px-3">
                    {{\App\Models\Trade::find($trade->id)->name}}
                    </div>
                @endforeach
            </div>
        </div>
        <div class="border-t-4 mt-8 md:mt-12 border-gray-400 p-4">
            <h3 class="text-gray-800 font-semibold text-base">Verification</h3>
            <p class="my-2 text-primary-300 font-semibold">{{ $company->verification }}</p>
        </div>
    </div>
</section>

<section>
    @include('components.footer-large')
</section>
@endsection