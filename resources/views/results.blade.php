@extends('layouts.landing-header')

@section('content')
  <section class="mb-16">
    <div class="mb-4 rounded-md mx-4">
      <div class="flex justify-center">
        <form method="GET" action="{{ route('search.results') }}">
          <div class="flex flex-col sm:flex-row items-center justify-center gap-1">
            <div class="w-56 sm:w-52 lg:w-60">
              <input type="text" name="trader" class="my-form-input" placeholder="Trader e.g. plumber" required>
            </div>
            <div class="w-56 sm:w-52 lg:w-60">
              <input type="text" name="location" class="my-form-input" placeholder="Location, e.g. Gaborone" required>
            </div>
            <div class="w-56 sm:w-52 lg:w-60">
              <button type="submit" class="px-4 py-2 rounded w-full my-btn">Search</button>
            </div>
          </div>  
        </form>
      </div>
    </div>
  @if($results->count()>0)
    @if(!empty($comment))
      <h3 class="mx-3 my-4 sm:mx-8 text-center text-gray-800">{{ $comment }}</h3>
    @endif
  <div class="md:flex justify-center">
    
    @foreach ($results as $result)
    <div class="flex flex-col my-6 mx-6 sm:mx-8 max-w-4xl rounded bg-gray-50 shadow-lg">
      <div class="flex flex-row justify-between">
        <div class="w-full pr-6 pl-4 pt-4 p-2">
            <div class="flex items-center">
              <a href="/trader/{{ $result->id }}/details">
                <h2 class="text-xl capitalize font-bold text-primary-600 hover:text-primary-300 tracking-wider hover:underline">{{$result->name}}</h2>
              </a>
              <svg xmlns="http://www.w3.org/2000/svg" class=" text-primary-300 h-5 w-5 mx-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <p class=" pb-5 mt-4">{{$result->intro}}</p>
        </div>

        <div class="border-primary-700 border-dashed border-2 w-36 h-36 bg-gray-100 shadow md:flex-shrink-0 hidden md:block">
          <svg xmlns="http://www.w3.org/2000/svg" class="text-primary-700 h-full w-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
        </div>
      </div> 

      <div class="flex flex-col sm:flex-row text-sm truncate p-2 space-y-4 sm:space-y-0 sm:space-x-4 space-x-0">
        <div class="flex flex-1 p-1 font-bold text-gray-900 border-solid border-2 border-gray-200">
          <svg xmlns="http://www.w3.org/2000/svg" class="text-primary-600 h-6 w-6 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          {{ $result->location }}
        </div>
        
        <div class="flex text-sm font-bold flex-1 p-1 text-gray-900 border-gray-200 border-solid border-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-primary-600 h-6 w-6 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
          </svg> 
          {{$result->telephone}}
        </div>
        <div class="flex flex-1 p-1 text-sm font-bold text-gray-900 border-gray-200 border-solid border-2">
          <svg xmlns="http://www.w3.org/2000/svg" class=" text-primary-600 h-6 w-6 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
          </svg>
          {{$result->mobile}}
        </div>
        <div class="flex flex-1 p-1 text-sm font-bold text-gray-900 border-solid border-gray-200 border-2 text-ellipsis">
          <svg xmlns="http://www.w3.org/2000/svg" class="text-primary-600 blue- h-6 w-6 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
          </svg>  
          {{$result->email}} 
        </div>
      </div>
    </div>
    @endforeach
    <!--- pagination  --->
    {{ $results->links() }}
  </div>
  @else
    <!---Invalid/ No result--->
    <div class="text-gray-900 text-2xl mt-32 mb-32 text-center font-medium">No results found for {{$trader}}</div>
  @endif
  </section>

  <section>
    @include('components.footer-large')
  </section>
@endsection