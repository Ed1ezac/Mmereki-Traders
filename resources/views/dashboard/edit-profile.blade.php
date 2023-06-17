@extends('layouts.dashboard-header')

@section('features')
<section class="my-section">
<div class="mt-4 mb-4">
    <div class="flex justify-between items-end">
        <h3 class="text-lg font-semibold leading-6 text-gray-900">Edit Profile</h3>
        <a href="/trader/{{ $company->id }}/details" class="my-btn">View Profile</a>
    </div>
    <div class="border-t-2 border-gray-300 my-4"></div>
</div>

<!---Logo--->
<section class="mt-10 sm:mt-0">
    <form action="/upload-logo" method="post" enctype="multipart/form-data">
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
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6 shadow sm:rounded-md">
                        <div class="sm:grid sm:grid-cols-9 sm:gap-6">
                            <div class="sm:col-span-2">
                                <div class="h-24 w-24 bg-green-100">
                                    <img class="w-24 h-24" 
                                    src="{{ url('storage/'.$company->logo) }}" 
                                    alt="">
                                </div>
                            </div>
                            <div class="sm:col-span-7">
                                <upload-field 
                                    identity="logo"
                                    hint="(Image) .jpg or .png file less than 5MB.">
                                </upload-field>
                            </div>
                            
                        </div>
                        <div class="flex justify-end items-center">
                            <button type="submit" class="my-btn">Upload</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>

<!---separator--->
<div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
        <div class="border-t border-gray-200"></div>
    </div>
</div>

<!---Info-->
<section class="mt-10 sm:mt-0">
    <form action="/update-profile" method="post"><!------>
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
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6 shadow sm:rounded-md">
                        <div class="grid grid-cols-6 gap-6">
                            <input type="hidden" name="id" value="{{ $company->id }}">
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
                                    <textarea maxlength="1200" name="about" rows="4" class="my-form-input required 
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
                                <input type="text" name="location" value="{{ $company->location }}" required autocomplete="location" class="mt-1 my-form-input 
                                @error('location') bg-red-300 border-red-400 focus:border-red-500 focus:ring-red-500 @enderror">
                                @error('location')
                                <span class="text-xs font-normal text-red-500" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!--trades-->
                            <div class="col-span-6">
                                <label for="trades" class="block text-sm font-medium text-gray-700">Trade (s)</label>
                                <trade-selector
                                    v-bind:trades="{{ $trades }}"
                                    v-bind:my-trades="{{ json_encode($my_trades) }}">
                                </trade-selector>
                                @error('trades')
                                <span class="text-xs font-normal text-red-500" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!--telephone-->
                            <div class="col-span-6 sm:col-span-3">
                                <label for="tel" class="block text-sm font-medium text-gray-700">Telephone</label>
                                <input type="tel" name="tel" value="{{ $company->telephone }}" required autocomplete="tel" class="mt-1 my-form-input  
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
                        <!------>
                        <div class="flex justify-end items-center">
                            <button type="submit" class="my-btn">Save</button>
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

<!---Qualification--->
<section class="mt-10 sm:mt-0 mb-16">
    <form action="/upload-document" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Trade Qualifications</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Your qualifications give clients more confidence when hiring you.
                    </p>
                </div>
            </div>
        
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        <div class="sm:grid sm:grid-cols-9 sm:gap-6">
                            <div class="sm:col-span-3">
                                <div class="">
                                @for($i=0; $i< count($qualifications); $i++)
                                    <div class="flex px-3 py-1 mb-2 bg-primary-600 items-center justify-between rounded-sm">
                                        <div class="text-white text-sm">
                                            {{ "Document".($i+1) }}
                                        </div>
                                        <div class="flex space-x-3">
                                            <div>
                                                <a href="/document/{{$qualifications[$i]->id}}/download" class="text-white hover:text-gray-400">
                                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 13l-3 3m0 0l-3-3m3 3V8m0 13a9 9 0 110-18 9 9 0 010 18z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="/document/{{$qualifications[$i]->id}}/delete" class="text-white hover:text-red-500">
                                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                                </div>
                            </div>
                            <div class="sm:col-span-6">
                                <upload-field 
                                    identity="cert"
                                    hint="(Document) .doc/.docx or .pdf file less than 2MB.">
                                </upload-field>
                            </div>
                        </div>
                        <div class="flex justify-end items-center">
                            <button type="submit" class="my-btn">Upload</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
</section>

@include('components.footer-large')
@endsection