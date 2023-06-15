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

    <div class="flex justify-center">
      <div class="flex-col items-center max-w-7xl 2xl:mx-auto">
        @foreach ($results as $result)
        <div class="flex flex-col my-12 mx-6 sm:mx-8 max-w-4xl rounded bg-white shadow-md">
          <div class="flex flex-row justify-between">
            <div class="w-full pr-6 pl-4 pt-4 p-2">
                <div class="flex items-center">
                    <a href="/trader/{{ $result->id }}/details">
                      <h2 class="text-xl capitalize font-bold text-primary-600 hover:text-primary-300 tracking-wider hover:underline">{{$result->name}}</h2>
                    </a>
                    @if($result->verification == 'verified')
                      <svg class="text-primary-300 h-5 w-5 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                      </svg>
                    @endif
                </div>
                <p class=" pb-5 mt-4">{{$result->intro}}</p>
            </div>

            @if($result->logo != null)
              <img class="object-cover w-32 h-32 md:flex-shrink-0 hidden md:block" src="{{ url('storage/'.$result->logo) }}" alt="trade logo">
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
    </div>
  @else
    <!---Invalid/ No result--->
    <div class="text-gray-900 text-2xl mt-32 mb-32 text-center font-medium">No results found for {{$trader}}</div>
  @endif
  </section>

  <section class="mt-16">
    @include('components.footer-large')
  </section>
@endsection