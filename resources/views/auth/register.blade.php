@extends('layouts.landing-header')

@push('page-css')
    <style>
    .birthday-field{
        display: none;
    }
    </style>
@endpush

@section('content')

<section class="max-w-7xl 2xl:mx-auto">

    <section class="mt-10 px-8 max-w-7xl 2xl:mx-auto">
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div>
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Company Info</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                This information will be displayed on the search result so make sure it's accurate.
                            </p>
                        </div>
                    </div>

                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <!-- div class="shadow "> sm:overflow-hidden --->
                        <div class="bg-white shadow sm:rounded-md px-4 py-5 space-y-6 sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <!--Company Name-->
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="company-name" class="block text-sm font-medium text-gray-700">Company name</label>
                                    <input type="text" name="company-name" value="{{ old('company-name') }}" id="company-name" autocomplete="company-name" class="mt-1 my-form-input required 
                                    @error('company-name') bg-red-300 border-red-400 focus:border-red-500 focus:ring-red-500 @enderror">
                                    @error('company-name')
                                    <span class="text-xs font-normal text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!---Intro-->
                                <div class="col-span-6">
                                    <label for="intro" class="block text-sm font-medium text-gray-700">Introduction</label>
                                    <div class="mt-1">
                                        <textarea maxlength="160" name="intro" rows="2" class="my-form-input required 
                                        @error('intro') bg-red-300 border-red-400 focus:border-red-500 focus:ring-red-500 @enderror" placeholder="Short introduction of your work here">{{ old('intro') }}</textarea>
                                    </div>
                                    @if(!empty($errors) && $errors->has('intro'))
                                        @error('intro')
                                        <span class="text-xs font-normal text-red-500" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    @else    
                                        <p class="mt-2 text-sm text-gray-500">
                                            Brief description of your company.
                                        </p>
                                    @endif
                                </div>
                                <!--Address-->
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="address" class="block text-sm font-medium text-gray-700">Full Address</label>
                                    <input type="text" name="address" value="{{ old('address') }}" autocomplete="given-name" class="mt-1 my-form-input required
                                    @error('address') bg-red-300 border-red-400 focus:border-red-500 focus:ring-red-500 @enderror">
                                    @error('address')
                                    <span class="text-xs font-normal text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!---location-->
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="location" class="block text-sm font-medium text-gray-700">Area of Operation</label>
                                    <location-selector
                                        v-bind:locations="{{ json_encode(\App\Models\Location::get(['id', 'name'])) }}"
                                        v-bind:my-location="{{ json_encode(old('location')) }}">
                                    </location-selector>
                                    <!-- input type="text" name="location" value="" class="mt-1 my-form-input required" -->
                                    @error('location')
                                    <span class="text-xs font-normal text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @else    
                                        <p class="mt-2 text-sm text-gray-500">
                                            This will automatically include surrounding areas.
                                        </p>
                                    @endif
                                </div>
                                <!--trades -->
                                <div class="col-span-6">
                                    <label for="trades" class="block mb-1 text-sm font-medium text-gray-700">Trade(s)</label>                                        
                                    <trade-selector
                                        v-bind:trades="{{ json_encode(\App\Models\Trade::get(['id', 'name'])) }}">
                                    </trade-selector>
                                    @error('trades')
                                    <span class="text-xs font-normal text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @else    
                                        <p class="mt-2 text-sm text-gray-500">
                                            Start typing to select your trade. You may choose more than one.
                                        </p>
                                    @endif
                                </div>
                                <!--telephone-->
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="tel" class="block text-sm font-medium text-gray-700">Telephone</label>
                                    <input type="tel" name="tel" value="{{ old('tel') }}" required autocomplete="mobile" class="mt-1 my-form-input  
                                    @error('tel') bg-red-300 border-red-400 focus:border-red-500 focus:ring-red-500 @enderror">
                                    @error('tel')
                                    <span class="text-xs font-normal text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!---mobile-->
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile</label>
                                    <input type="text" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" class="mt-1 my-form-input
                                    @error('mobile') bg-red-300 border-red-400 focus:border-red-500 focus:ring-red-500 @enderror">
                                    @error('mobile')
                                    <span class="text-xs font-normal text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!--Company Email-->
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="company-email" class="block text-sm font-medium text-gray-700">Company email</label>
                                    <input type="email" name="company-email" value="{{ old('company-email') }}" required autocomplete="company-email" class="mt-1 my-form-input 
                                    @error('company-email') bg-red-300 border-red-400 focus:border-red-500 focus:ring-red-500 @enderror">
                                    @error('company-email')
                                    <span class="text-xs font-normal text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!--- /div -->
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
                                        <div class="birthday-field">
                                            <label for="birthday">Birthday</label>
                                            <input type="text" name="birthday" id="birthday" value=""/>
                                        </div>
                                        <!--Email-->
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="email" class="block text-sm font-medium text-gray-700">Login Email</label>
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

                <div class="mt-10 mb-12">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0"></div>
                        </div>

                        <div class="mt-4 md:mt-0 md:col-span-2">
                            <div class="pr-2 py-5 sm:pr-6">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input name="terms" type="checkbox" class="focus:ring-primary-500 h-4 w-4 text-primary-400 border-primary-400" required>
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="terms" class="font-medium text-gray-700">Terms and Conditions</label>
                                        <p class="text-gray-500">By clicking accept, you will be agreeing to &copy; Mmereki Tradesmen <a class="my-link" href="/terms">Terms & Conditions</a>&nbsp;, 
                                        <a class="my-link" href="/privacy-policy">Privacy Policy</a> and code of conduct.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="w-80 mt-4">
                                <button type="submit" class="w-full font-medium my-btn">
                                <span class="mr-3 flex items-center">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                                    </svg>
                                </span>
                                Register
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </section>
</section>

<section>
    @include('components.footer-large')
</section>
@endsection


