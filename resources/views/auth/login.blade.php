@extends('layouts.landing-header')

@section('content')
<section>
    <h3 class="flex sm:mt-6 2xl:mt-10 text-gray-700 justify-center p-2 text-3xl font-medium mx-6">Welcome Back!</h3>
    <div class="flex justify-center mt-4 mb-12">
        <div class="bg-white shadow-md overflow-hidden w-full max-w-sm rounded-md">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="px-6 py-2 space-y-6 sm:p-6">
                    <div>
                        <label for="email" class="my-form-label">
                        Email
                        </label>
                        <input type="email" name="email" id="email" autocomplete="email" required class="w-full 
                        my-form-input @error('email') bg-red-200 border-red-400 focus:ring-red-400 @enderror">
                            @error('email')
                            <span class="text-xs p-1 bg-red-100 rounded font-normal text-red-400" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div>
                        <label for="password" class="my-form-label">
                        Password
                        </label>
                        <input type="password" name="password" class="w-full my-form-input"/>
                            @error('password')
                            <span class="text-xs p-1 bg-red-100 rounded font-normal text-red-400" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="inline-flex items-center">
                            <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-primary-400 focus:ring-2 focus:ring-primary-500 border-primary-400">
                            <label for="remember" class="ml-2 my-form-label">
                                Remember me
                            </label>
                        </div>
                        <a class="font-semibold my-link" href="{{ route('password.request') }}">Forgot your password?</a>
                    </div>
                    <!---button-->
                    <div>
                        <button type="submit" class="group relative w-full my-btn">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <svg class="h-5 w-5 group-hover:text-primary-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            Log In
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
