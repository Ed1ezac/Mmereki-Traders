@extends('layouts.landing-header')

@section('content')
<section class="py-24">
    <!---About--->
    <div class="lg:max-w-7xl lg:mx-auto">
        <p class="text-center md:text-left px-14 text-xl max-w-5xl">
            Mmereki Trades is a platform for tradespeople like plumbers, builders 
            and painter to showcase themselves to potential clients while still 
            allowing potential clients to have a single place to find all the tradespeople 
            they may need for a job that they require to be done.  
        </p>
    </div>
</section>
<section class="bg-white py-14">
    <!---How it works--->
    <div class="flex flex-col items-center lg:max-w-7xl lg:mx-auto">
        <h3 class="text-4xl py-8 font-semibold">How Does It Work?</h3>
        <div class="flex flex-col sm:flex-row space-x-16 space-y-6 px-8">
            <div class="ml-6 mt-6">
                A tradesperson registers their account on the platform by filling out the 
                <span><a href="/register">Registration</a></span> form. Their account is 
                immediately listed on the platform pending verification.
            </div>
            <div>
                Our team will then go through the Tradesperson's information in order
                to verify them. This includes an identifty verification and certification 
                follow up if any exist.
            </div>
            <div>
                The Tradesperson's account is then marked as verified and prioritised 
                in the search result. The Trade can then choose a platform membership 
                plan of their choice which comes with several benefits.
            </div>
        </div>
    </div>
</section>
<section>
    <!---All AvailableTrades-->
    <div class="py-14">
        <h3 class="text-4xl text-center py-8 font-semibold">Eligible Trades</h3>
        <div class="flex flex-col mx-8 max-w-md md:max-w-full items-center md:mx-0 md:flex-row justify-center md:space-x-14">
            @for ($i=0; $i< count($trades); $i++)
                @if ($i == 0 || ($i%12 == 0))
                    @if($i == 0)
                        <div class="flex-col">
                    @elseif ($i == count($trades) -1 )
                        </div>
                    @else
                        </div>
                        <div class="flex-col">
                    @endif
                @else    
                    <div class="bg-white px-5 py-2 mt-3 text-gray-700 font-semibold rounded-md shadow-md">{{ $trades[$i]->name }}</div>
                @endif
            @endfor
            </div>
            @foreach ($trades as $trade)
            @endforeach
        </div>
    </div>
</section>
@endsection