@extends('layouts.dashboard-header')

@section('features')
<section class="my-section">


@if($company->about == null || $company->logo == null)
<div class="p-2 mb-4 border-t-2 border-primary-300">
    Your profile is incomplete <a href="/edit-profile" class="inline-flex ml-8 my-btn">Complete Your Profile</a>
</div>
@endif

<div class="bg-white mt-4 shadow max-w-2xl rounded-lg p-4">
    <div class="text-gray-500 py-8 px-8">
        <span class="text-lg font-semibold underline">{{ $company->name }}</span> of membership 
        <span class="text-lg font-semibold underline">{{ $membership->code }}</span> registered on the &copy;Mmereki Trades platform 
        subject to termination upon breach of the <a href="#code-of-conduct" class="my-link">Traders Code of Conduct</a>
        and the <a href="/terms" class="my-link">Terms of Service</a> and the <a href="/privacy-policy" class="my-link">Privacy Policy</a>.
    </div>
</div>
</section>
<!---Profile Edit---->
<section class="my-2 py-4 my-section">
    <h3 class="my-4 text-center text-xl font-semibold">Quick Profile Overview</h3>
    <div class="flex flex-col">
        <div class="flex flex-wrap space-y-6 mb-6">
            <form method="POST" class="max-w-md sm:mr-8 mt-6" action="/update-intro">
                @csrf
                <div class="flex flex-col">
                    <label for="intro">Intro</label>
                    <textarea class="my-form-input rounded" type="text" name="intro" id="intro" cols="40" rows="3">{{ $company->intro }}</textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="mt-2 my-btn">Update</button>
                </div>                    
            </form>

            <div class="flex">
                <div class="mr-5">
                    <form method="POST" action="/update-location">
                        @csrf
                        <div class="flex flex-col">
                            <label for="intro">Location</label>
                            <input type="text" name="location" id="intro" class="my-form-input rounded" value="{{ $company->location }}">
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="mt-2 my-btn">Update</button>
                        </div>
                    </form>
                </div>
                <!--- div class="mr-5">
                    <form method="POST" action="/update-tel">
                        @csrf
                        <div class="flex flex-col">
                            <label for="tel">Telephone</label>
                            <input type="text" name="telephone"  id="tel" class="my-form-input rounded" value="{{ $company->telephone }}">
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="mt-2 my-btn">Update</button>
                        </div>
                    </form>
                </div -->
                <div>
                    <form method="POST" action="/update-mobile">
                        @csrf
                        <div class="flex flex-col">
                            <label for="mob">Mobile</label>
                            <input type="text" name="mobile" id="mob" class="my-form-input rounded" value="{{ $company->mobile }}">
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="mt-2 my-btn">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="">
            <form method="POST" action="/update-about">
                @csrf
                <div class="flex flex-col max-w-2xl">
                    <label for="about">About</label>
                    <textarea name="about" id="" cols="30" rows="6" class="my-form-input rounded">{{ $company->about }}</textarea>
                </div>
                <div class="flex justify-end max-w-2xl">
                    <button type="submit" class="mt-2 my-btn">Update</button>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="my-section" id="#code-of-conduct">
    <div class="bg-white border border-gray-300 rounded-md my-14 overflow-scroll mx-8 sm:mx-16 py-12 px-16">
        <h3 class="mb-12 text-center text-3xl font-semibold">Members Code of Conduct</h3>
        <p class="">
            Lorem ipsum dolor sit amet bluh bla is hthe text that was used to
            check fonts.

            This is a very important thing to do because it will usually set a look and 
            fell of something and conceptualize it before it is hardcoded and put out 
            to the general consumer. 
        </p>
    </div>
</section>

@include('components.footer-large')
@endsection

