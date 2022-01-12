@extends('headers.landing-header')

@push('page-css')
    <style>
    .birthday-field{
        display: none;
    }
    </style>
@endpush

@section('content')
@include('components.navbar')
<!--Electrical contractors for installation and maintenance-->
<section class="pt-20">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="py-2 px-2 bg-red-500 text-white">
            {{  $error }}
        </div>
        @endforeach
    @endif
    <section>
    <!--Hero Section--->
    </section>

    <section class="mt-10 px-8">
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div>
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Company Info</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                This information will be displayed as the search result so make sure it's accurate.
                            </p>
                        </div>
                    </div>

                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
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
                                            @error('intro') bg-red-300 border-red-400 focus:border-red-500 focus:ring-red-500 @enderror" placeholder="Mention your operating areas here">{{ old('intro') }}</textarea>
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
                                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
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
                                        <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                                        <input type="text" name="location" value="{{ old('location') }}" required autocomplete="location" class="mt-1 my-form-input required">
                                        @error('location')
                                        <span class="text-xs font-normal text-red-500" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <!--trades-->
                                    <div class="col-span-6">
                                        <label for="trades" class="block text-sm font-medium text-gray-700">Trade (s)</label>
                                        <select id="trades" name="trades" required autocomplete="trades" class="mt-1 block w-full py-2 px-3 border bg-gray-300 shadow-sm focus:outline-none sm:text-sm
                                        @error('address') bg-red-300 border-red-400 focus:border-red-500 focus:ring-red-500 @enderror">
                                            <option value="1">Plumber</option>
                                            <option value="2">Electrician</option>
                                            <option value="3">Builder</option>
                                            <option value="4">Gardener</option>
                                            <option value="5">Roofer</option>
                                            <option value="6">Tiler</option>
                                        </select>
                                        @error('trades')
                                        <span class="text-xs font-normal text-red-500" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
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
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information & Authentication</h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Personal information and login details.
                                </p>
                            </div>
                        </div>

                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="shadow overflow-hidden sm:">
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

                <div class="mt-10 mb-12">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0"></div>
                        </div>

                        <div class="mt-4 md:mt-0 md:col-span-2">
                            <div class="pr-2 py-5 sm:pr-6">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input name="terms" type="checkbox" class="focus:ring-gray-500 h-4 w-4 text-gray-600 border-gray-300 rounded-sm" required>
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="terms" class="font-medium text-gray-700">Terms and Conditions</label>
                                        <p class="text-gray-500">By clicking accept, you will be agreeing to &copyMmereki Traders <a class="text-blue-400 underline" href="#">Terms & Conditions</a> , 
                                        <a class="text-blue-400 underline" href="#">Privacy Policy</a> and code of conduct.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="w-80 mt-4">
                                <button type="submit" class="inline-flex justify-center py-2 w-full rounded px-4 border border-transparent shadow-sm text-sm font-medium  text-white bg-gray-700 hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
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
@endsection

<!--div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</!--div -->

