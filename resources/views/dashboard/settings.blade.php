@extends('layouts.dashboard-header')

@section('features')
<div class="mt-4 mb-4">
    <h3 class="text-lg font-semibold mb-6 leading-6 text-gray-900">Manage Account</h3>
   
    <div class="border-t-2 border-gray-300 my-4"></div>
</div>


<section class="mb-16">
    <form action="/settings/update-user" method="post">
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
                                <div class="grid grid-cols-6 gap-6 mb-8">
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <!--First Name-->
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                                        <input type="text" name="first-name" value="{{ explode(' ', $user->name)[0] }}" required autocomplete="given-name" class="mt-1 my-form-input 
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
                                        <input type="text" name="last-name" required value="{{ explode(' ', $user->name)[1] }}" autocomplete="family-name" class="mt-1 my-form-input 
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
                                        <input type="email" name="email" required value="{{ $user->email }}" autocomplete="email" class="mt-1 my-form-input required 
                                        @error('email') bg-red-300 border-red-400 focus:border-red-500 focus:ring-red-500 @enderror">
                                        @error('email')
                                        <span class="text-xs font-normal text-red-500" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <!--Old Password-->
                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="old-password" class="block text-sm font-medium text-gray-700">Old Password</label>
                                        <input type="password" name="old-password" autocomplete="old-password" class="mt-1 my-form-input 
                                        @error('old-password') bg-red-300 border-red-400 focus:border-red-500 focus:ring-red-500 @enderror">
                                        @if(!empty($errors) && $errors->has('old-password'))
                                            @error('old-password')
                                            <span class="text-xs font-normal text-red-500" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        @else    
                                            <p class="mt-2 text-sm text-gray-500">
                                                Leave empty if you don't want to change your password.
                                            </p>
                                        @endif
                                    </div>
                                    <!--New Password-->
                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                                        <input type="password" name="password" autocomplete="password" class="mt-1 my-form-input 
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
                                        <input type="password" name="password_confirmation" autocomplete="password-confirmation" class="mt-1 my-form-input 
                                        @error('password_confirmation') bg-red-300 border-red-400 focus:border-red-500 focus:ring-red-500 @enderror">
                                        @error('password_confirmation')
                                        <span class="text-xs font-normal text-red-500" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex justify-end items-center">
                                    <button type="submit" class="my-btn">Update</button>
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
            
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Notifications</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Alerts about important information.
                            </p>
                        </div>
                    </div>

                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div>
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input name="notify-end" type="checkbox" class="focus:ring-accent-200 h-4 w-4 text-accent-100 border-gray-300">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="comments" class="font-medium text-gray-700">Email Notification</label>
                                            <p class="text-gray-500">Get notified via email.</p>
                                        </div>
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

            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-red-700">Delete Account</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Delete your account and all your ascociated information.
                            </p>
                        </div>
                    </div>

                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="flex flex-col">
                                    <div class="flex">
                                        <a href="#" class="my-btn hover:bg-red-600">Delete Account</a>
                                    </div>
                                    <div class="text-gray-500 text-sm mt-3">
                                        All your user records including all current subscriptions and uploaded files, 
                                        will be permanently erased. Please proceed with caution.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</section>        
@endsection