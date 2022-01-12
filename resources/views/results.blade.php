@extends('headers.landing-header')

@section('content')
  @include('components.navbar')
  <section class="pt-20">
    <div class="-mt-2 mb-4 rounded-md mx-4">
      <div class="flex justify-center">
        <form method="post" action="/search">
          @csrf
          <div class="flex flex-col sm:flex-row items-center justify-center gap-1">
            <div class="w-56 sm:w-52 lg:w-60">
              <input type="text" name="trader" class="my-form-input" placeholder="Trader e.g. plumber" required>
            </div>
            <div class="w-56 sm:w-52 lg:w-60">
              <input type="text" name="location" class="my-form-input" placeholder="Location, e.g. Gaborone" required>
            </div>
            <div class="w-56 sm:w-52 lg:w-60">
              <button type="submit" class="bg-gray-700 px-4 py-2 rounded w-full text-white">Search</button>
            </div>
          </div>  
        </form>
      </div>
    </div>
  @if($results->count()>0)
    @if(!empty($comment))
      <h3 class="mx-3 sm:mx-8 text-gray-800">{{ $comment }}</h3>
    @endif
    @foreach ($results as $result)
    <div class="flex flex-col md:flex my-6 mx-3 sm:mx-8 max-w-4xl rounded bg-gray-50 shadow-lg">
      <div class="flex flex-row justify-between shadow">
        <div class="w-full pr-6 pl-4 pt-4 p-2 shadow">
            <div class="flex items-center">
              <a href="/trader/{{ $result->id }}/details">
                <h2 class="text-xl capitalize font-bold text-blue-900 tracking-wider hover:underline">{{$result->name}}</h2>
              </a>
              <svg xmlns="http://www.w3.org/2000/svg" class=" text-blue-900 h-5 w-5 mx-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <p class=" pb-5 mt-4">{{$result->intro}}</p>
        </div>

        <div class="border-blue-900 border-dashed border-2 w-36 h-36 bg-gray-100 shadow md:flex-shrink-0 hidden md:block">
          <svg xmlns="http://www.w3.org/2000/svg" class=" text-blue-900 h-full w-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
        </div>
      </div> 

      <div class="flex flex-col sm:flex-row text-sm p-2 space-y-4 sm:space-y-0 sm:space-x-4 space-x-0 shadow">
        <!--div class="hidden md:flex flex-1 p-1 border-solid border-2 text-gray-900 border-gray-200 font-bold">
          <svg xmlns="http://www.w3.org/2000/svg" class=" text-blue-900 h-6 w-6 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
            Register Guranteed
        </!--div -->
        
        <div class="flex text-sm font-bold flex-1 p-1 text-gray-900 border-gray-200 border-solid border-2">
            <svg xmlns="http://www.w3.org/2000/svg" class=" text-blue-900 h-6 w-6 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
          </svg> 
          {{$result->telephone}}
        </div>
        <div class="flex flex-1 p-1 text-sm font-bold text-gray-900 border-gray-200 border-solid border-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="  text-blue-900 h-6 w-6 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
          </svg>
          {{$result->mobile}}
        </div>
        <div class="flex flex-1 p-1 text-sm font-bold text-gray-900 border-solid border-gray-200 border-2">
          <svg xmlns="http://www.w3.org/2000/svg" class=" text-blue-900 blue- h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
          </svg>  
          {{$result->email}}
        </div>
      </div>
    </div>
    @endforeach
    <!--- pagination --->
    {{ $results->links() }}
  @else
    <!---Invalid/ No result--->
    <div class="text-gray-900 text-2xl mt-32 text-center font-medium">No results found for {{$trader}}</div>
  @endif
  </secti>
@endsection