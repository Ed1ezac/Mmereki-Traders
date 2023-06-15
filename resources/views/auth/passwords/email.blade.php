@extends('layouts.landing-header')

@section('content')
<section class="pt-20 max-w-7xl">

    <div class="flex justify-center items-center">
        <div class="shadow sm:rounded-md sm:overflow-hidden w-96">
            <div class="px-4 py-5 bg-white sm:p-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __('Reset Password') }}</h3>
                <div class="mt-4">
                    <form action="{{ route('password.email') }}" method="Post">
                        @csrf
                        <div class="mb-6">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" required value="{{ old('email') }}" autocomplete="email" class="mt-1 my-form-input required 
                            @error('email') bg-red-300 border-red-400 focus:border-red-500 focus:ring-red-500 @enderror">
                            @error('email')
                            <span class="text-xs font-normal text-red-500" role="alert">
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
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection
