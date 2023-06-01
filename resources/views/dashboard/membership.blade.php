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
<div class="flex flex-wrap gap-8 mt-12 mb-8">
    <div class="bg-white shadow rounded w-56 py-4">
        <div class="flex-col justify-center space-y-6">
            <div>
                <h3 class="text-gray-800 font-semibold text-base mx-4">Standard Plan</h3>
                <p class="text-gray-600 text-xs mt-1 mb-4 mx-4">Ideal for sole traders looking to get listed on the platform</p>
            </div>
            <div class="flex align-top py-4 bg-gray-200">
                <h6 class="text-xl ml-4 mt-1">P</h6>
                <h3 class="text-6xl font-light">50</h3>
                <p class="text-gray-600 mx-4 mt-2 text-xs">Billed annually via a once off payment</p>
            </div>
            <div class="mx-4 text-xs text-gray-600">
                <ul class="space-y-2">
                    <li>Searchable</li>
                    <li>Free Member Verification</li>
                </ul>
            </div>
            <div class="flex justify-center">
                <a href="#" class="mx-4 border py-1 px-10 text-sm border-gray-400 rounded">Buy Plan</a>
            </div>
        </div>
        
    </div>

    <div class="bg-white shadow rounded w-56 py-4">
        <div class="flex-col justify-center space-y-6">
            <div>
                <h3 class="text-gray-800 font-semibold text-base mx-4">Professional Plan</h3>
                <p class="text-gray-600 text-xs mt-1 mb-4 mx-4">Perfect for experienced traders to get the most out of the platform</p>
            </div>
            <div class="flex align-top py-4 bg-gray-200">
                <h6 class="text-xl ml-4 mt-1">P</h6>
                <h3 class="text-6xl font-light">100</h3>
                <p class="text-gray-600 mx-4 mt-2 text-xs">Billed annually via a once off payment</p>
            </div>
            <div class="mx-4 text-xs text-gray-600">
                <ul class="space-y-2">
                    <li>Searchable</li>
                    <li>Free Member Verification</li>
                </ul>
            </div>
            <div class="flex justify-center">
                <a href="#" class="mx-4 border py-1 px-10 text-sm border-gray-400 rounded">Buy Plan</a>
            </div>
        </div>
        
    </div>
</div>

<!--Subscription Options--->
@endsection