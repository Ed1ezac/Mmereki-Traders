@extends('layouts.dashboard-header')

@section('features')
<section class="pb-16 my-8 my-section">
    <div class="flex flex-col-reverse sm:flex-row">
        <div class="bg-white shadow-sm p-6 sm:mr-16">
            <form action="#" method="get">
                
                <input type="hidden" name="amount" value="{{$amount}}">
                <div class="mb-5">
                    <label for="card-number">Card Number</label>
                    <input class="my-form-input" type="text" name="card-number" id="card-number">
                </div>

                <div class="flex space-x-4 mb-5">
                    <div class="w-32">
                        <label for="expiry-month">Expiry Month</label>
                        <input class="my-form-input" type="month" name="expiry-month" id="expiry-month">
                    </div>
                    <div class="w-32">
                        <label for="expiry-year">Expiry Year</label>
                        <input class="my-form-input" type="text" name="expiry-year" id="expiry-month">
                    </div>
                </div>

                <div class="mb-8 w-32">
                    <label for="cvv">CVV</label>
                    <input class="my-form-input" type="text" name="cvv" id="cvv">
                </div>

                <div class="flex justify-center">
                    <button class="my-btn bg-gray-800 hover:bg-gray-600 w-48" type="submit">Pay</button>
                </div>
            </form>
        </div>

        <div class="mt-0 mb-4 sm:mt-6 sm:mb-0">
            <div class="flex flex-col border-2 border-gray-300 pt-4 pb-8 px-8">
                <p class="text-gray-500 text-sm">Payment Amount</p>
                <h3 class="text-gray-800 text-4xl font-light">P{{ $amount }}</h3>
            </div>
        </div>
    </div>
</section>

@include('components.footer-large')
@endsection