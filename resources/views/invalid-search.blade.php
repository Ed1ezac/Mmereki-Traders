@extends('headers.landing-header')

@section('content')
<section>
    <div class='bg-white '>
        <p class='bg-gray-300 font-bold text-black text-center p-8'>Invalid Search</p>
        <div class=' bg-gray-200 justify-between flex flex-row'>
            <p class=' bg-gray-200 w-18 p-8 '>The quick brown fox  lorem ipsum dolor...</p>
            <div class=' bg-gray-300 right-center mr-8'> Traders Directory</div>
        </div>
        <div class=' bg-white  shadow'>
            <svg class="h-20 w-20 ml-15 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            <p class=' bg-gray-200 p-10 text-center'>The quick brown fox ipsum dolor....</p>

        </div>
    </div>

</section>
<section>
    <div class='mt-3 p-2 ml-16 bg-white shadow'>
        
        <div class="flex flex-row justify-around">
            <div class='flex flex-col'>
                <p class='bg-gray-200 top-1/4 my-2'>text.....</p>
                <div class=' bg-gray-200  '>see how it works </div>
                
            </div>
            <div class='flex flex-col'>
                <h2 class='capitalize font-bold text-gray-900  tracking-widest'>Useful links</h2>
                <div class=' bg-gray-200 mt-3'>About us</div>
                <div class='mt-3 bg-gray-200'>Help and Advice</div>
                <div class=' mt-3 bg-gray-200'>News</div>
                <div class='mt-3 bg-gray-200'>Customer gurantee</div>
            </div>
            <div class='flex flex-col'>
                <div class=' bg-gray-200'>Trade associations</div>
                <div class=' bg-gray-200 mt-3'>Trade directory</div>
                <div class=' bg-gray-200 mt-3'>Payment service</div>
            </div>
            <div class='flex flex-col'>
                <div class='bg-gray-200'>Privacy policy</div>
                <div class='bg-gray-200 mt-3'>Disclaimer</div>
                <div class='bg-gray-200 mt-3 flex flex-row'> Social pages</div>
            </div>

            <div class='flex flex-col'>
                <div class='bg-gray-200'>Adversing</div>
                <div class='bg-gray-200 mt-3'>Contact us</div>
                <div class='bg-gray-200 mt-3'>Terms </div>
            </div>
        </div>

        </div>
         <div class='mt-3 ml-16 bg-white'>
             <div class="flex justify-between ...">
                 <div class="bg-gray-200 order-last flex flex-row "><svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>app store</div>
                 <div class='bg-gray-200 mt-3 flex flex-row'><svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg><svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>social media platform</div>
                 <div class='bg-gray-200 mt-3 flex flex-row'><svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>google play</div>
                </div> 
         </div>
        <div class='mt-3 ml-16 bg-white'></div>
    </div>
</section>
@endsection