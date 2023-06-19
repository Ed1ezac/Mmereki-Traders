@extends('layouts.dashboard-header')

@section('features')
<section class="my-section">


@if($company->about == null || $company->logo == null)
<div class="p-2 mb-4 border-t-2 border-primary-300">
    Your profile is incomplete <a href="/edit-profile" class="inline-flex ml-8 my-btn">Complete Your Profile</a>
</div>
@endif

<div class="bg-white mt-4 shadow max-w-2xl rounded-lg p-4">
    <h3 class="text-gray-700 text-lg font-semibold px-8 mb-3">{{ $company->name }} - {{ $membership->code }}</h3>
    <div class="text-gray-500 px-8">
        You are registered on the &copy;Mmereki Trades platform, please obey the  
        <a href="#code-of-conduct" class="my-link">Traders Code of Conduct</a>
        and the <a href="/terms" class="my-link">Terms of Service</a> and the 
        <a href="/privacy-policy" class="my-link">Privacy Policy</a> to avoid your account being suspended.
    </div>
</div>
</section>

<section class="mt-4 py-4 my-section">
    <h3 class="mt-4 mb-2 text-center text-xl font-semibold">Quick Profile Overview</h3>
    <p class="text-sm mb-4 text-gray-400 text-center">This is how your profile looks like on the search result.</p>

    <div class="flex flex-col my-8 max-w-4xl rounded bg-white shadow-md">
        <div class="flex flex-row justify-between">
            <div class="w-full pr-6 pl-4 pt-4 p-2">
                <div class="flex items-center">
                    <a href="/trader/{{ $company->id }}/details">
                      <h2 class="text-xl capitalize font-bold text-primary-600 hover:text-primary-300 tracking-wider hover:underline">{{$company->name}}</h2>
                    </a>
                    @if($company->verification == 'verified')
                      <svg class="text-primary-300 h-5 w-5 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd"/>
                      </svg>
                    @endif
                </div>
                <p class=" pb-5 mt-4">{{$company->intro}}</p>
            </div>

            @if($company->logo != null)
            <img class="border border-primary-500 object-cover w-32 h-32 md:flex-shrink-0 hidden md:block" src="{{ url('storage/'.$company->logo) }}" alt="trade logo">
            @else
            <div class="border-primary-700 border-dashed border-2 w-32 h-32 bg-gray-100 md:flex-shrink-0 hidden md:block">          
                <svg xmlns="http://www.w3.org/2000/svg" class="text-primary-700 h-full w-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            @endif
        </div> 

        <div class="flex flex-col sm:flex-row text-sm truncate p-2 space-y-4 sm:space-y-0 sm:space-x-4 space-x-0">
            <div class="flex flex-1 p-1 font-bold text-gray-900 border-solid border-2 border-gray-200">
                <svg class="text-primary-600 h-6 w-6 mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                </svg>
                {{ $company->location }}
            </div>
            <div class="flex text-sm font-bold flex-1 p-1 text-gray-900 border-gray-200 border-solid border-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-primary-600 h-6 w-6 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg> 
                {{$company->telephone}}
            </div>
            <div class="flex flex-1 p-1 text-sm font-bold text-gray-900 border-gray-200 border-solid border-2">
                <svg xmlns="http://www.w3.org/2000/svg" class=" text-primary-600 h-6 w-6 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                </svg>
                {{$company->mobile}}
            </div>
            <div class="flex flex-1 p-1 text-sm font-bold text-gray-900 border-solid border-gray-200 border-2 text-ellipsis">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-primary-600 blue- h-6 w-6 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>  
                {{$company->email}} 
            </div>
        </div>
    </div>
</section>

<!---Profile Edit---->
<section class="mb-8 my-section">
    <h3 class="mt-4 mb-2 text-center text-xl font-semibold">Quick Profile Edit</h3>
    <p class="text-sm mb-4 text-gray-400 text-center">Edit your profile's basic information below.</p>

    <div class="flex flex-col max-w-4xl">
        <div class="flex flex-wrap space-y-6 mb-6">
            <form method="POST" class="max-w-md sm:mr-8 mt-6" action="/update-intro">
                @csrf
                <div class="flex flex-col">
                    <label for="intro">Intro</label>
                    <textarea class="my-form-input rounded" type="text" name="intro" id="intro" cols="40" rows="3">{{ $company->intro }}</textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="mt-2 my-btn">Update</button>
                </div>                    
            </form>

            <div class="flex">
                <div class="mr-6">
                    <form method="POST" action="/update-location">
                        @csrf
                        <div class="flex flex-col">
                            <label for="intro">Location</label>
                            <input type="text" name="location" id="intro" class="my-form-input rounded" value="{{ $company->location }}">
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="mt-2 my-btn">Update</button>
                        </div>
                    </form>
                </div>
                <!--- div class="mr-5">
                    <form method="POST" action="/update-tel">
                        @csrf
                        <div class="flex flex-col">
                            <label for="tel">Telephone</label>
                            <input type="text" name="telephone"  id="tel" class="my-form-input rounded" value="{{ $company->telephone }}">
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="mt-2 my-btn">Update</button>
                        </div>
                    </form>
                </div -->
                <div>
                    <form method="POST" action="/update-mobile">
                        @csrf
                        <div class="flex flex-col">
                            <label for="mob">Mobile</label>
                            <input type="text" name="mobile" id="mob" class="my-form-input rounded" value="{{ $company->mobile }}">
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="mt-2 my-btn">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="">
            <form method="POST" action="/update-about">
                @csrf
                <div class="flex flex-col max-w-2xl">
                    <label for="about">About</label>
                    <textarea name="about" id="" cols="30" rows="6" class="my-form-input rounded">{{ $company->about }}</textarea>
                </div>
                <div class="flex justify-end max-w-2xl">
                    <button type="submit" class="mt-2 my-btn">Update</button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- section class="my-section" id="#code-of-conduct">
    <div class="bg-white border border-gray-300 rounded-md my-14 overflow-scroll mx-8 sm:mx-16 py-12 px-16">
        <h3 class="mb-12 text-center text-3xl font-semibold">Members Code of Conduct</h3>
        <p class="">
            Lorem ipsum dolor sit amet bluh bla is hthe text that was used to
            check fonts.

            This is a very important thing to do because it will usually set a look and 
            fell of something and conceptualize it before it is hardcoded and put out 
            to the general consumer. 
        </p>
    </div>
</section -->

@include('components.footer-large')
@endsection

