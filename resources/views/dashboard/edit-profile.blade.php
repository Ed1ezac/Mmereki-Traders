@extends('layouts.dashboard-header')

@section('features')
<div class="mt-4 mb-4">
    <div class="flex justify-between items-center">
    <h3 class="text-lg font-medium mb-6 leading-6 text-gray-900">Edit Profile</h3>
    <a href="/trader/{{ $company->id }}/details" class="bg-gray-300 p-1 mb-6">View Profile</a>
    </div>
    <div class="border-t-2 border-gray-300 my-4"></div>
</div>

<!---Info-->
<section>
    <form action="#" method="post"><!------>
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
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <!--Company Name-->
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="company-name" class="block text-sm font-medium text-gray-700">Company name</label>
                                    <input type="text" name="company-name" value="{{ $company->name }}" id="company-name" autocomplete="company-name" class="mt-1 my-form-input required 
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
                                        @error('intro') bg-red-300 border-red-400 focus:border-red-500 focus:ring-red-500 @enderror" placeholder="Short introduction of your work, 
                                        include areas where you operate">{{ $company->intro }}</textarea>
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
                                <!---About--> 
                                <div class="col-span-6">
                                    <label for="about" class="block text-sm font-medium text-gray-700">About</label>
                                    <div class="mt-1">
                                        <textarea maxlength="500" name="about" rows="4" class="my-form-input required 
                                        @error('about') bg-red-300 border-red-400 focus:border-red-500 focus:ring-red-500 @enderror" placeholder="Full Description of your work here">{{ $company->about }}</textarea>
                                    </div>
                                    @if(!empty($errors) && $errors->has('about'))
                                        @error('about')
                                        <span class="text-xs font-normal text-red-500" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    @else    
                                        <p class="mt-2 text-sm text-gray-500">
                                            Full description of your company.
                                        </p>
                                    @endif
                                </div>
                                <!--Address-->
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                    <input type="text" name="address" value="{{ $company->address }}" autocomplete="given-name" class="mt-1 my-form-input required
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
                                    <input type="text" name="location" value="{{ $company->location }}" required autocomplete="location" class="mt-1 my-form-input required">
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
                                    <input type="tel" name="tel" value="{{ $company->telephone }}" required autocomplete="mobile" class="mt-1 my-form-input  
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
                                    <input type="text" name="mobile" value="{{ $company->mobile }}" required autocomplete="mobile" class="mt-1 my-form-input
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
                                    <input type="email" name="company-email" value="{{ $company->email }}" required autocomplete="company-email" class="mt-1 my-form-input 
                                    @error('company-email') bg-red-300 border-red-400 focus:border-red-500 focus:ring-red-500 @enderror">
                                    @error('company-email')
                                    <span class="text-xs font-normal text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!-------->
                            <div class="flex justify-end items-center bg-gray-100">
                                <button type="submit" class="p-1">Save</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</section>

<div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
        <div class="border-t border-gray-200"></div>
    </div>
</div>

<!---Logo--->
<section class="mt-10 sm:mt-0">
    <form action="#" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Company Logo</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            A logo makes your company profile look proffessional and increases your chances of getting hired.
                        </p>
                    </div>
                </div>
            
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            
                        </div>
                    </div>
                </div>
        </div>
    </form>
</section>
@endsection