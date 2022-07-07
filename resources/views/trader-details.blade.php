@extends('layouts.landing-header')

@section('content')
<section>
    <div class="h-80 bg-gray-400 -mt-4 z-0 px-16">
        <!---Background Image HERE--->
        <div class="flex items-end pb-10 h-full max-w-7xl 2xl:mx-auto">
            <div class="flex flex-col sm:flex-row">
                <div class="border-blue-900 border-dashed border-2 w-36 h-36 bg-gray-100 shadow md:flex-shrink-0">
                    @if ($company->logo === null)
                        <svg xmlns="http://www.w3.org/2000/svg" class=" text-blue-900 h-full w-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    @else
                        <img class="" 
                            src="{{ url('storage/'.$company->logo) }}" 
                        alt="">
                    @endif
                </div>
                <div class="flex flex-col justify-center space-y-2 sm:mx-8">
                    <h3 class="text-3xl font-semibold text-white">{{ $company->name }}</h3>
                    <h5 class="text-xl text-white">{{ $company->location }}</h5>
                    <div class="flex flex-col sm:flex-row text-sm space-y-2 sm:space-y-0 sm:space-x-4 space-x-0">
                        <div class="flex text-base flex-1 py-1 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class=" text-gray-700 h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg> 
                            {{$company->telephone}}
                        </div>
                        <div class="flex text-base py-1 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="  text-gray-700 h-6 w-6 mr-1 sm:mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                            {{$company->mobile}}
                        </div>
                        <div class="flex text-base py-1 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class=" text-gray-700 h-6 w-6 mr-1 sm:mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
            <p class="my-2">{{ $company->about }}</p>
        </div>
    </div>
    <div class="col-span-1 mx-8 sm:mx-16 md:mx-0 md:mr-4 mt-8 md:mt-0">
        <div class="border-t-4 border-gray-400 p-4">
            <h3 class="text-gray-800 font-semibold text-base">Address</h3>
            <p class="my-2">{{ $company->address }}</p>
        </div>
        <div class="border-t-4 mt-8 md:mt-12 border-gray-400 p-4">
            <h3 class="text-gray-800 font-semibold text-base">Trades</h3>
            <div class="flex flex-wrap my-2">
                @foreach ($company->trades as $trade )
                    <div class="bg-gray-400 text-white font-semibold rounded-full py-1 px-2">
                    {{\App\Models\Trade::find($trade->trade_id)->name}}
                    </div>
                @endforeach
            </div>
        </div>
        <div class="border-t-4 mt-8 md:mt-12 border-gray-400 p-4">
            <h3 class="text-gray-800 font-semibold text-base">Verification</h3>
            <p class="my-2">{{ $company->verification }}</p>
        </div>
    </div>
</section>

@endsection