@extends('layouts.dashboard-header')

@section('features')

<div class="bg-white rounded shadow p-4 max-w-2xl">
    <div class="flex justify-between divide-x-2 space-x-4">
        <div>
            <h6 class="text-gray-400 text-xs font-bold">{{ $membership->code }}</h6>
            <h3 class="text-gray-800 font-semibold text-base">{{ Auth::user()->company->name }}</h3>
            <p class="text-sm text-gray-500">{{ Auth::user()->name }}</p>
        </div>
        <div class="pl-8 pr-0">
            <h6 class="text-gray-400 text-xs font-bold">Type</h6>
            <h3 class="text-gray-800 font-semibold text-base">{{ $membership->type }} Membership</h3>
            <p class="text-sm text-gray-500">P{{ $membership->billing }}</p>
        </div>
        <div class="px-8">
            <h6 class="text-gray-400 text-xs font-bold">Status</h6>
            <h3 class="text-gray-800 font-semibold text-base">{{ $membership->status }}</h3>
            <p class="text-sm text-gray-500">Expires in 2 days</p>
        </div>
    </div>
</div>

<!---PLANS-->
<!--- P90,   P162-27, save 11%,  P300 save 20%  ---->
<div class="flex flex-wrap gap-8 mt-12 mb-8">
    <div class="bg-white shadow rounded-b w-56 py-4 mr-8 border-t-4 border-yellow-400">
        <div class="flex-col justify-center space-y-6">
            <div>
                <h3 class="text-gray-800 font-semibold text-base mx-4">3 Months Plan</h3>
                <p class="text-gray-600 text-xs mt-1 mb-4 mx-4">Ideal for sole traders looking to get listed on the platform</p>
            </div>
            <div class="flex align-top py-4 bg-yellow-300">
                <h6 class="text-xl ml-4 mt-1">P</h6>
                <h3 class="text-yellow-900 text-6xl font-light">90</h3>
                <p class="text-yellow-800 mx-4 mt-2 text-xs">Once off payment for a 3 month membership period.</p>
            </div>
            <div class="mx-4 text-xs text-gray-600">
                <ul class="space-y-2">
                    <li>Searchable</li>
                    <li>Free Member Verification</li>
                </ul>
            </div>
            <div class="flex justify-center">
                <form method="get" action="/membership/subscribe">
                    @csrf
                    <input type="hidden" name="price" value="90">
                    <button type="submit" class="mx-4 py-1 px-10 my-btn bg-yellow-500 hover:bg-yellow-700">Buy Plan</button>
                </form>
            </div>
        </div>
    </div>

    <div class="bg-white shadow rounded-b w-56 py-4 mr-8 border-t-4 border-purple-400">
        <div class="flex-col justify-center space-y-6">
            <div>
                <h3 class="text-gray-800 font-semibold text-base mx-4">6 Months Plan</h3>
                <p class="text-gray-600 text-xs mt-1 mb-4 mx-4">Perfect for experienced traders to get the most out of the platform</p>
            </div>
            
            <div class="flex align-top py-4 bg-purple-400">
                <h6 class="text-xl ml-4 mt-1">P</h6>
                <h3 class="text-purple-900 text-6xl font-light">162</h3>
                <p class="text-purple-800 mx-4 mt-2 text-xs">Once off payment for 6 months membership</p>
            </div>
            <div class="mx-4 text-xs text-gray-600">
                <ul class="space-y-2">
                    <li>Searchable</li>
                    <li>Free Member Verification</li>
                </ul>
            </div>
            <div class="flex justify-center">
                <form method="get" action="/membership/subscribe">
                    @csrf
                    <input type="hidden" name="price" value="162">
                    <button type="submit" class="mx-4 py-1 px-10 my-btn bg-purple-500 hover:bg-purple-700">Buy Plan</button>
                </form>
            </div>
        </div>
    </div>

    <div class="bg-white shadow rounded-b w-56 py-4 border-t-4 border-blue-400">
        <div class="flex-col justify-center space-y-6">
            <div>
                <h3 class="text-gray-800 font-semibold text-base mx-4">12 Months Plan</h3>
                <p class="text-gray-600 text-xs mt-1 mb-4 mx-4">Perfect for experienced traders to get the most out of the platform</p>
            </div>
            
            <div class="flex align-top py-4 bg-blue-400">
                <h6 class="text-xl ml-4 mt-1">P</h6>
                <h3 class="text-blue-900 text-6xl font-light">300</h3>
                <p class="text-sky-800 mx-4 mt-2 text-xs">Once off payment for 12 months membership</p>
            </div>
            <div class="mx-4 text-xs text-gray-600">
                <ul class="space-y-2">
                    <li>Searchable</li>
                    <li>Free Member Verification</li>
                </ul>
            </div>
            <div class="flex justify-center">
                <form method="get" action="/membership/subscribe">
                    @csrf
                    <input type="hidden" name="price" value="300">
                    <button type="submit" class="mx-4 py-1 px-10 my-btn bg-blue-500 hover:bg-blue-700">Buy Plan</button>
                </form>
            </div>
        </div>
        
    </div>
</div>

<!--Subscription Options--->
@endsection