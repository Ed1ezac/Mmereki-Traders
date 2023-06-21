@extends('layouts.dashboard-header')

@section('features')
<section class="my-section">
<div class="mt-4 mb-3">
    <div class="flex justify-between items-end">
        <h3 class="text-lg font-semibold leading-6 text-gray-900">Verify Company</h3>
        <div class="flex space-x-3">
            @if($company->verification == 'pending')
                <form action="/admin/company/verify" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $company->id }}">
                    <button type="submit" class="my-btn">Verify</button>
                </form> 
            @else
                <form action="/admin/company/unverify" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $company->id }}">
                    <button type="submit" class="my-btn">Unverify</button>
                </form> 
            @endif
            <a href="/trader/{{ $company->id }}/details" class="my-btn">Profile</a>
        </div>
    </div>
    <div class="border-t border-gray-300 my-4"></div>
</div>

<section class="mt-10 sm:mt-0 mb-10">
    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="flex flex-col sm:grid sm:grid-cols-6 gap-6 sm:divide-x">
                <div class="px-2 space-y-2 col-span-3">
                    <div class="flex">
                        <div class="text-lg font-medium text-gray-900">
                            {{$company->name}}
                        </div>
                        <div class="ml-8">
                            @if($company->verification == 'pending')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-200 text-gray-700">
                                {{$company->verification}}
                            </span>
                            @elseif($company->verification == 'verified')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                {{$company->verification}}
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="text-sm text-gray-500">
                        {{$company->user->name}}
                    </div>
                    <div class="text-sm text-gray-500">
                        {{$company->email}}
                    </div>
                    <div class="text-sm text-gray-500">
                        {{$company->address}}
                    </div>
                    <div class="text-sm text-gray-500">
                        {{ $company->location->name }}
                    </div>
                    <div class="text-sm text-gray-500">
                        {{$company->telephone.', '.$company->mobile}}
                    </div>
                </div>

                <div class="px-2 space-y-2 col-span-3">
                    <div class="flex">
                        <div class="text-lg font-medium text-gray-900">
                            {{ $company->membership->code }}
                        </div>

                        <div class="ml-8">
                            @if($company->membership->status == 'active')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                {{ $company->membership->status }}
                            </span> 
                            @elseif($company->membership->status == 'disabled')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-200 text-red-700">
                                {{ $company->membership->status }}
                            </span>
                            @else($company->membership->status == 'expired')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-600">
                                {{ $company->membership->status }}
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="text-sm text-gray-500">
                        {{$company->membership->type.' Membership'}}
                    </div>
                    <div class="text-sm text-gray-500">
                        {{'Valid until '.$company->membership->expiry}}
                    </div>
                    <div class="pt-4 flex flex-wrap">
                        <a class="mr-3 mb-2 my-btn-small" href="/admin/membership/{{$company->membership->id}}/invoke-expiry">Set As Expired</a>
                        <a class="mr-3 mb-2 my-btn-small hover:bg-red-600" href="/admin/membership/{{$company->membership->id}}/revoke">Disable Membership</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mt-10 sm:mt-0 mb-10">
    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="flex flex-col sm:grid sm:grid-cols-6 gap-6 sm:divide-x">
                <h3 class="text-lg text-gray-900">Company Certification</h3>
                <!--div class="px-2 space-y-2 space-x-2 col-span-2">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-200 text-gray-700">
                        {{$company->verification}}
                    </span>
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-200 text-gray-700">
                        {{$company->verification}}
                    </span>
                </div -->
                <div class="px-2 space-y-2 col-span-4">
                    @if(count($company->qualifications) > 0)
                    <div class="flex flex-wrap">
                        @for($i=0; $i< count($company->qualifications); $i++)
                        <div class="flex flex-col w-16 mr-5">
                            <div class="h-20 border border-gray-500 rounded-sm">
                                <div class="flex justify-center items-center h-full w-full">
                                    <a class="text-gray-500" href="/admin/document/{{$company->qualifications[$i]->id}}/download">
                                        <svg class="h-8 w-8 opacity-40" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 13l-3 3m0 0l-3-3m3 3V8m0 13a9 9 0 110-18 9 9 0 010 18z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="text-sm text-center text-gray-500">{{ 'Cert-'.($i+1) }}</div>
                        </div>
                        @endfor
                    </div>
                    @else
                    <p class="text-gray-400 py-4 text-center">All the relevant company certification will appear here.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@include('components.footer-large')
@endsection