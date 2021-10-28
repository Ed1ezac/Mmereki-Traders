@extends('headers.landing-header')

@section('content')
  @if(1>0)
  <div class="flex flex-col mx-auto max-w-4xl rounded mt-16 md:flex bg-white shadow-lg">
    <div class='flex flex-row justify-between  bg-white shadow'>
        <div class='w-full pr-6 pl-4 pt-4 p-2 bg-gray-200 shadow'>
            <a href="/trader-details"><h2 class="capitalize font-bold text-blue-900  tracking-widest">bj sons</h2></a>
            <p class=" pb-5 pt-4 mt-4">The quick brown fox  lorem ipsum dolor...</p>
        </div>

        <div class='border-blue-900 border-solid border-2 w-40 h-40 bg-gray-200 shadow md:flex-shrink-0'>
          <svg xmlns="http://www.w3.org/2000/svg" class=" text-blue-900 h-full w-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
        </div>
    </div>
      <div class=' text-sm flex space-x-4 p-2 shadow'>
        <div class='border-blue-900 border-solid border-2  font-bold flex-1 p-1 bg-gray-200 flex flex-row'>
          <svg xmlns="http://www.w3.org/2000/svg" class=" text-blue-900 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
            Register Guranteed
        </div>
        
      
        
        <div class=' text-sm font-bold flex-1 p-1 border-blue-900 border-solid border-2  flex flex-row bg-gray-200'>
               <svg xmlns="http://www.w3.org/2000/svg" class=" text-blue-900 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
              </svg> 
              +267 498752
            </div>
            <div class=' text-sm font-bold flex-1 p-1 border-blue-900 border-solid border-2  flex flex-row bg-gray-200'>
              <svg xmlns="http://www.w3.org/2000/svg" class="  text-blue-900 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
              </svg>
              +267 76025479
            </div>
            <div class=' border-blue-900 border-solid border-2 text-sm font-bold flex-1 p-1  flex flex-row bg-gray-200 '>
              <svg xmlns="http://www.w3.org/2000/svg" class=" text-blue-900 blue- h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>  
              letsomosinyi@gmail.com
            </div>
    </div>
   
        
  </div>
  @else
    <!---Invalid/ No result--->
  @endif

@endsection