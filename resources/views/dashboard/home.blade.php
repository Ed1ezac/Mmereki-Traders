@extends('layouts.dashboard-header')

@section('features')

<div class="bg-white p-4 mb-4 border-t-2 border-yellow-400">
    Your profile is incomplete <a href="/edit-profile" class="border rounded p-1 border-gray-300">Complete Your Profile</a>
</div>

<div class="bg-gray-500 max-w-2xl rounded-lg p-4">
    <div class="text-white py-36 px-8">
        <span class="text-lg font-semibold underline">{{ $company->name }}</span> of membership 
        <span class="text-lg font-semibold underline">{{ $membership->code }}</span> registered on the &copy;Mmmereki Traders platform 
        subject to termination upon breach of the <a href="/code-of-conduct" class="text-gray-200 hover:no-underline hover:font-sembold hover:text-gray-600">Traders Code of Conduct</a>
        and the <a href="/terms" class="text-gray-200 hover:font-sembold hover:text-gray-600">Terms of Service</a> and the <a href="/privacy-policy" class="text-gray-200 hover:font-sembold hover:text-gray-600">Privacy Policy</a>.
    </div>
</div>
<!--div>
    Membership, Profile, 
</!--div -->
@endsection




<!--div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</!--div -->