@extends('layouts.dashboard-header')

@section('features')
<section class="my-section">
    
    <div class="sm:grid grid-cols-10">
        <div class="col col-span-7">
            <div class="bg-white rounded shadow p-6 max-w-2xl">
                <div class="flex justify-between divide-x-2 space-x-4">
                    <div>
                        <h6 class="text-gray-400 text-xs font-bold">{{ $membership->code }}</h6>
                        <h3 class="text-gray-800 my-1 font-semibold text-base">{{ Auth::user()->company->name }}</h3>
                        <p class="text-sm text-gray-500">{{ Auth::user()->name }}</p>
                    </div>
                    <div class="pl-8 pr-0">
                        <h6 class="text-gray-400 text-xs font-bold">Type</h6>
                        <h3 class="text-gray-800 my-1 font-semibold text-base">{{ $currentSub->type }} Membership</h3>
                        @if($currentSub->amount == 0)
                        <p class="text-sm text-gray-500">Free</p>
                        @else
                        <p class="text-sm text-gray-500">P{{ $currentSub->amount }}</p>
                        @endif
                    </div>
                    <div class="px-8">
                        <h6 class="text-gray-400 text-xs font-bold">Status</h6>
                        @if($currentSub->status == 'active')
                        <h3 class="text-green-700 my-1 font-semibold text-base">{{ $currentSub->status }}</h3>
                        @else
                        <h3 class="text-red-600 my-1 font-semibold text-base">{{ $currentSub->status }}</h3>
                        @endif
                        <!---Expiry date---->
                        <p class="text-sm text-gray-500">Valid til: {{ $currentSub->expiry }}</p>
                    </div>
                </div>
            </div>

            <div class="mb-16">
                @if (isset($allSubs) && count($allSubs) > 1)
                <div class="mr-4 xl:mr-6 mt-8 xl:mt-10">
                    <div class="-my-2 sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="max-w-5xl shadow border-b border-gray-200 sm:rounded">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                            Subscription Type
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                            Amount
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                            Valid Until
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($allSubs as $sub)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $sub->type }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    P{{ $sub->amount }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $sub->expiry }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                    @if($sub->status == 'active')
                                                    <span class="text-green-500 font-semibold">{{ $sub->status }}</span>
                                                    @else
                                                    <span class="text-gray-500">{{ $sub->status }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if($allSubs->hasPages())
                                    <div class="px-4 py-2">{{ $allSubs->links() }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="mt-20 mb-32">
                    <h3 class="text-4xl text-gray-900 mb-4">Add a Subscription</h3>
                    <p class="text-xl text-gray-500 max-w-md mb-8">Subscribe to one of our plans to make sure your company is visible at all times.</p>

                    <form action="/membership/subscribe" method="GET">
                        <input type="hidden" name="amount" value="90">
                        <button class="my-btn py-2">Add Subscription</button>
                    </form>
                </div>
                @endif
            </div>
        </div>
        <div class="col col-span-3 mb-8">
            <div class="flex justify-end">
                <div class="hidden md:block mr-8 border-l border-dashed border-gray-200"></div>
                <div class="flex flex-row sm:flex-col">
                    <div class="sm:mb-4 mr-3 sm:mr-0">
                        <div class="bg-white shadow-md rounded-b-lg px-8 py-3 border-t-8 border-yellow-400">
                            <p class="text-gray-700 text-sm uppercase mb-2 font-semibold">3 Months</p>
                            <h3 class="text-gray-900 text-4xl mb-1 font-light">P90</h3>
                            <p class="text-gray-500 text-sm mb-3">P<span class="font-bold">30</span>/mo</p>
                            
                            <div class="flex justify-center">
                                <form method="get" action="/membership/subscribe">
                                    @csrf
                                    <input type="hidden" name="price" value="90">
                                    <button type="submit" class="px-6 py-1 my-btn bg-yellow-500 hover:bg-yellow-700 focus:ring-yellow-600">Buy Plan</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="sm:mb-4 mr-3 sm:mr-0">
                        <div class="bg-white shadow-md rounded-b-lg px-8 py-3 border-t-8 border-purple-400">
                            <p class="text-gray-700 text-sm uppercase mb-2 font-semibold">6 Months</p>
                            <h3 class="text-gray-900 text-4xl mb-1 font-light">P162</h3>
                            <p class="text-gray-500 text-sm mb-3">P<span class="font-bold">27</span>/mo, save <span class="font-bold">11</span>%</p>
                          
                            <div class="flex justify-center">
                                <form method="get" action="/membership/subscribe">
                                    @csrf
                                    <input type="hidden" name="price" value="162">
                                    <button type="submit" class="px-6 py-1 my-btn bg-purple-500 hover:bg-purple-700 focus:ring-purple-600">Buy Plan</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <div class="bg-white shadow-md rounded-b-lg px-8 py-3 border-t-8 border-blue-400">
                            <p class="text-gray-700 text-sm uppercase mb-2 font-semibold">12 Months</p>
                            <h3 class="text-gray-900 text-4xl mb-1 font-light">P300</h3>
                            <p class="text-gray-500 text-sm mb-3">P<span class="font-bold">25</span>/mo, save <span class="font-bold">20</span>%</p>
                      
                            <div class="flex justify-center">
                                <form method="get" action="/membership/subscribe">
                                    @csrf
                                    <input type="hidden" name="price" value="300">
                                    <button type="submit" class="px-6 py-1 my-btn bg-blue-500 hover:bg-blue-700 focus:ring-blue-600">Buy Plan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Subscription Options--->
@include('components.footer-large')
@endsection

<!---PLANS-->
<!--- P90, P162-27, save 11%,  P300 save 20%  ---
<div class="flex flex-wrap gap-8 mt-12 mb-12" -->
    <!--Plan 1---
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
                    <button type="submit" class="mx-4 py-1 px-10 my-btn bg-yellow-500 hover:bg-yellow-700 focus:ring-yellow-600">Buy Plan</button>
                </form>
            </div>
        </div>
    </div -->

    <!--Plan 2---
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
                    <button type="submit" class="mx-4 py-1 px-10 my-btn bg-purple-500 hover:bg-purple-700 focus:ring-purple-600">Buy Plan</button>
                </form>
            </div>
        </div>
    </div -->

    <!--Plan 3-
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
                    <button type="submit" class="mx-4 py-1 px-10 my-btn bg-blue-500 hover:bg-blue-700 focus:ring-blue-600">Buy Plan</button>
                </form>
            </div>
        </div>
        
    </div>
</div -->