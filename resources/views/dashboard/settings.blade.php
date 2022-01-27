@extends('layouts.dashboard-header')

@section('features')
<div class="mt-4 mb-4">
    <h3 class="text-lg font-medium mb-6 leading-6 text-gray-900">Manage Account</h3>
   
    <div class="border-t-2 border-gray-300 my-4"></div>
</div>


<section>
    <form action="#" method="post"><!------>
        @csrf
        <div>
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information & Authentication</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Personal information and login details.
                            </p>
                        </div>
                    </div>

                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <!--First Name-->
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                                        <input type="text" name="first-name" value="{{ old('first-name') }}" required autocomplete="given-name" class="mt-1 my-form-input 
                                        @error('first-name') bg-red-300 border-red-400 focus:border-red-500 focus:ring-red-500 @enderror">
                                        @error('first-name')
                                        <span class="text-xs font-normal text-red-500" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <!---Last name--->
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                                        <input type="text" name="last-name" required value="{{ old('last-name') }}" autocomplete="family-name" class="mt-1 my-form-input 
                                        @error('last-name') bg-red-300 border-red-400 focus:border-red-500 focus:ring-red-500 @enderror">
                                        @error('last-name')
                                        <span class="text-xs font-normal text-red-500" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <!--Email-->
                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                        <input type="email" name="email" required value="{{ old('email') }}" autocomplete="email" class="mt-1 my-form-input required 
                                        @error('email') bg-red-300 border-red-400 focus:border-red-500 focus:ring-red-500 @enderror">
                                        @error('email')
                                        <span class="text-xs font-normal text-red-500" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <!--Password-->
                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                        <input type="password" name="password" autocomplete="password" required class="mt-1 my-form-input 
                                        @error('password') bg-red-300 border-red-400 focus:border-red-500 focus:ring-red-500 @enderror">
                                        @error('password')
                                        <span class="text-xs font-normal text-red-500" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <!---Comfirm Password-->
                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="password-confirmation" class="block text-sm font-medium text-gray-700">Confirm password</label>
                                        <input type="password" name="password_confirmation" autocomplete="password-confirmation" required class="mt-1 my-form-input 
                                        @error('password_confirmation') bg-red-300 border-red-400 focus:border-red-500 focus:ring-red-500 @enderror">
                                        @error('password_confirmation')
                                        <span class="text-xs font-normal text-red-500" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hidden sm:block" aria-hidden="true">
                <div class="py-5">
                    <div class="border-t border-gray-200"></div>
                </div>
            </div>


        </div>
    </form>
</section>        
@endsection