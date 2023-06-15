@extends('layouts.landing-header')

@section('content')

<section class="pt-20 max-w-7xl">

    <div class="flex justify-center items-center">
        <div class="shadow sm:rounded-md sm:overflow-hidden w-96">
            <div class="px-6 py-5 bg-white sm:p-6">
                <h3 class="text-lg text-center font-medium leading-6 text-gray-900">{{ __('Confirm Password') }}</h3>
                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf
                    <h3 class="text-gray-500">{{ __('Please confirm your password before continuing.') }}</h3>
                    <div class="mt-4 space-y-6">
                        <div>
                            <label for="password" class="my-form-label">Password</label>
                            <input type="password" name="password" class="w-full my-form-input"/>
                                @error('password')
                                <span class="text-xs p-1 bg-red-100 rounded font-normal text-red-400" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div>
                            <button type="submit" class="group relative w-full my-btn">
                                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                {{ __('Confirm Password') }}
                            </button>
                        </div>
                        @if (Route::has('password.request'))
                        <div class="flex justify-center">
                            <a class="font-semibold text-gray-700 hover:text-accent-800" href="{{ route('password.request') }}">Forgot your password?</a>
                        </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
@endsection
