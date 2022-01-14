@extends('headers.landing-header')

@section('content')
<section class="pt-20 max-w-7xl">
    @if (session('resent'))
        <div class="mb-4 p-2 bg-gray-200 text-base font-semibold">
            {{ __('A new verification link has been sent to your email address.') }}
        </div>
    @endif
    <div class="flex justify-center">
        <div class="p-4 mx-8 bg-white shadow">
            <h3 class="text-gray-800 font-semibold text-base">{{ __('Verify Your Email Address') }}</h3>
            <div class="my-2">
                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }},
                <form class="inline-flex" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="bg-gray-700 p-1">{{ __('click here to request another') }}</button>.
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
