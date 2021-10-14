@extends('headers.landing-header')

@section('content')

<div class="flex flex-col rounded mt-16 mx-16 bg-white shadow">
    <div class='flex flex-row  bg-red-200 shadow'>
        <div class=' w-3/4 mt-2 ml-4 p-2 bg-blue-500 shadow'>
            <a href="/trader-details"><h2 class="capitalize font-bold text-gray-900  tracking-widest">bj sons</h2></a>
            <p class="my-2">The quick brown fox  lorem ipsum dolor...</p>
        </div>

        <div class=' w-1/4 ml-4 p-2 bg-blue-500 shadow'>company logo</div>
    </div>
    <div class=' flex space-x-4 p-2 shadow'>
        <div class='flex-1 p-1 '>Register Guranteed</div>
        <div class='flex-1 p-1 '>Telephone</div>
        <div class='flex-1 p-1 '>Mob</div>
        <div class='flex-1 p-1 '>email</div>
        <div class='flex-1 p-1 '>sms</div>
        <div class='flex-1 p-1 '>call back</div>
    </div>
   
        
</div>

@endsection