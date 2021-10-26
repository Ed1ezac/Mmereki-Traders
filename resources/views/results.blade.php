@extends('headers.landing-header')

@section('content')

<div class="flex flex-col rounded mt-16 mx-16 bg-white shadow">
    <div class='flex flex-row  bg-white shadow'>
        <div class=' w-3/4 mt-2 ml-4 p-2 bg-gray-200 shadow'>
            <a href="/trader-details"><h2 class="capitalize font-bold text-blue-900  tracking-widest">bj sons</h2></a>
            <p class="my-2">The quick brown fox  lorem ipsum dolor...</p>
        </div>

        <div class=' w-1/4 ml-4 p-2 bg-gray-200 shadow'><svg class="h-20 w-20 center text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg></div>
    </div>
    <div class=' flex space-x-4 p-2 shadow'>
        <div class='flex-1 p-1 bg-gray-200 flex flex-row'><svg class="h-7 w-7 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>Register Guranteed</div>
        <div class='flex-1 p-1  bg-gray-200'>Telephone</div>
        <div class='flex-1 p-1 flex flex-row bg-gray-200'>Mob</div>
        <div class='flex-1 p-1 flex flex-row bg-gray-200 '><svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>Email</div>
        <div class='flex-1 p-1 flex flex-row bg-gray-200'><svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>Sms</div>
        <div class='flex-1 p-1 flex flex-row bg-gray-200'><svg class="h-5 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>Call Back</div>
    </div>
   
        
</div>

@endsection