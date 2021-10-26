@extends('headers.landing-header')

@section('content')
<section>
    <div class='bg-gray-100'>
        <p class='bg-gray-200 font-bold text-blue-900 text-2xl text-center p-8 shadow'>
            Invalid Search
        </p>
        <div class=' bg-gray-200 justify-between flex flex-row'>
            <p class='flex flex-center bg-gray-200 w-18 p-8 '>
                The quick brown fox  lorem ipsum dolor...
            </p>
            
        </div>
        <div class='flex flex-col bg-gray-100  shadow'>
            <div class='bg-gray-100 mx-auto '>
                <svg xmlns="http://www.w3.org/2000/svg" class=" text-red-500 h-20 w-20 text-center" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            </div class=' bg-gray-100 '>
                <div class='bg-gray-100 mx-auto'>
                     <p class=' bg-gray-100 p-10 ml-24 text-red-500 font-bold text-xl text-center'>
                    Invalid Search! Try again.
                    </p>
                </div>
            </div>
            <div>
            <div class='mx-auto  bg-gray-100 text-lg text-blue-900 p-5 mt-2 mb-2 w-52'>
                 Search Again
            </div>

        </div>
    </div>

</section>

@endsection