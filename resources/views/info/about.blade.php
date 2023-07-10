@extends('layouts.landing-header')

@push('page-css')
    <style>
        
    </style>
@endpush

@section('content')
<section class="-mt-6 pt-16 pb-16 bg-primary-100">
    <!---About--->
    <div class="lg:max-w-7xl lg:mx-auto">
        <h3 class="text-center md:text-left text-primary-900 text-xl px-16 font-semibold">About</h3>
        <p class="text-center md:text-left px-16 text-lg mt-2 max-w-5xl text-primary-800">
            Mmereki Tradesmen is a platform for tradespeople like plumbers, builders 
            and painters to showcase themselves to potential clients while still 
            allowing potential clients to have a single place to find all the tradespeople 
            they may need for a job that they require to be done.
        </p>
    </div>
</section>
<section class="bg-white py-14">
    <!---How it works--->
    <div class="flex flex-col items-center lg:max-w-7xl lg:mx-auto">
        <h3 class="text-4xl text-gray-900 py-8 font-semibold">How does it work?</h3>

        <h3 class="text-2xl text-gray-700 pt-2 pb-8 font-semibold">Searching for a Trade</h3>
        <div>
            <div>
                <p class="text-gray-500 px-16 mb-6">On the landing page you'll see an input form for searching that looks like the one below.</p>
                <div class="flex justify-center">
                    <img class="" src="{{ asset('search-bar.png') }}" alt="">
                </div>
            </div>
            <!--- Trade --->
            <div class="flex space-x-32 mt-24 px-16">
                <div>
                    <h3 class="text-primary-800 text-xl font-semibold">Trade Input</h3>
                    <p class="max-w-md text-gray-500 mt-2">This input field is for entering the Trade you want to find. It is a basic text input 
                        which can also be used to find a Trade by name.
                    </p>
                    <ul class="list-disk pt-8">
                        <li class="flex mb-8 text-gray-500 font-medium">
                            <svg class="w-6 h-6 mr-4 text-primary-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Type the type of trade you are looking for
                        </li>
                        <li class="flex mb-8 text-gray-500 font-medium">
                            <svg class="w-6 h-6 mr-4 text-primary-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            You can also enter the name of a Trades-person
                        </li>
                        <li class="flex mb-8 text-gray-500 font-medium">
                            <svg class="w-6 h-6 mr-4 text-primary-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            This field does NOT have pop-up selection
                        </li>
                    </ul>
                </div>
                <div class="sm:-mt-8">
                    <img class="w-80 h-80" src="{{ asset('trade-input.png') }}" alt="">
                </div>
            </div>
            <div class="flex justify-end space-x-32 mt-24 px-16">
                <div class="sm:-mt-8">
                    <img class="w-80 h-80" src="{{ asset('location-input.png') }}" alt="">
                </div>
                <div>
                    <h3 class="text-primary-800 text-xl font-semibold">Location Input</h3>
                    <p class="max-w-md text-gray-500 mt-2">This input field is for the location of the Trade. 
                        It is an enhanced text input that displays a list of major towns and villages in Botswana for you to pick from.
                    </p>
                    <ul class="list-disk pt-8 max-w-sm">
                        <li class="flex mb-8 text-gray-500 font-medium">
                            <svg class="w-6 h-6 mr-4 text-primary-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Type the location of the trade you are looking for
                        </li>
                        <li class="flex mb-8 text-gray-500 font-medium">
                            <svg class="w-6 h-6 mr-4 text-primary-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Choose a location from the list shown on the pop-up
                        </li>
                        <li class="flex mb-8 text-gray-500 font-medium">
                            <svg class="w-6 h-6 mr-4 text-primary-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            This field has pop-up selection
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <h3 class="text-2xl mt-6 text-gray-700 py-8 font-semibold">Registering as a Trade</h3>
        <div class="flex flex-col md:flex-row md:space-x-8 xl:space-x-16 py-6 px-16">
            <div class="flex flex-col pt-8 md:pt-0 mt-2">
                <div class="flex items-center">
                    <div class="flex items-center justify-center h-10 w-10 rounded-full bg-primary-100">
                        <svg class="w-6 h-6 text-primary-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                    </div>
                    <h3 class="ml-3 text-lg text-gray-600 font-semibold">Registration</h3>
                </div>
                <div class="mt-2 text-gray-500">
                    A tradesperson registers their account on the platform by filling out the 
                    <span><a class="my-link" href="/register">Registration</a></span> form. Their account is 
                    immediately listed on the platform pending verification.
                </div>
            </div>
            <div class="flex flex-col pt-8 md:pt-0 mt-2">
                <div class="flex items-center">
                    <div class="flex items-center justify-center h-10 w-10 rounded-full bg-primary-100">
                        <svg class="w-6 h-6 text-primary-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0118 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3l1.5 1.5 3-3.75" />
                        </svg>
                    </div>
                    <h3 class="ml-3 text-lg text-gray-600 font-semibold">Vetting & Verification</h3>
                </div>
                <div class="mt-2 text-gray-500">
                    Our team will then go through the Trade's information in order
                    to verify them. This includes an identity and certification verification 
                    follow up if any exist.
                </div>
            </div>
            <div class="flex flex-col pt-8 md:pt-0 mt-2">
                <div class="flex items-center">
                    <div class="flex items-center justify-center h-10 w-10 rounded-full bg-primary-100">
                        <svg class="w-6 h-6 text-primary-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                        </svg>
                    </div>
                    <h3 class="ml-3 text-lg text-gray-600 font-semibold">Listing</h3>
                </div>
                <div class="mt-2 text-gray-500">
                    The Tradesperson's account is then marked as verified and prioritised 
                    in the search result. The Trade can then choose a platform membership 
                    plan of their choice which comes with several benefits.
                </div>
            </div>
        </div>
    </div>
</section>
<section class="my-section">
    <!---All AvailableTrades-->
    <div class="py-14">
        <h3 class="text-4xl text-center py-8 font-semibold">Eligible Trades</h3>        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($trades as $trade)  
                <div class="bg-white col-span-1 max-w-xs px-5 py-2 mt-4 mr-4 text-gray-700 font-semibold rounded-md shadow-md">{{ $trade->name }}</div>
            @endforeach
        </div>
        <p class="text-center mt-8 text-gray-500">Don't see your trade here, contact us and we'll add it.</p>
    </div>
</section>

<section>
    @include('components.footer-large')
</section>
@endsection