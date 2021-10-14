@extends('headers.landing-header')


@section('content')
<section>
    <div class='space-y-108 flex flex-col rounded mt-16 mx-16 bg-white shadow'>
        <div class='flex flex-row  bg-white shadow'>
            <div class=' w-3/4 mt-2 ml-4 p-2 bg-white shadow'>
                <h2 class="capitalize font-bold text-gray-900  tracking-widest">bj sons</h2>
                <p class="my-2">location...</p>
            </div>
            <div class='pd-20 w-1/4 ml-4 p-2 bg-gray-500 shadow'>company logo
            </div>

         </div>

        <div class='flex space-x-4 p-2 bg-gray-500 shadow'>
            <div class='flex-1 p-1 '>Tel;</div>
            <div class='flex-1 p-1 '>Mob;</div>
            <div class='flex-1 p-1 '>request callback</div>
            <div class='flex-1 p-1 '>email</div>
            <div class='flex-1 p-1 '>sms</div>
            <div class='flex-1 p-1 '>website</div>
               
        </div>  

       <div class='flex space-x-3 p-2 bg-gray-500 shadow'>
            <div class='flex-1 p-1 '>membership number;</div>
            <p class="flex-1 p-1">dont forget.......</p>
            <p class="flex-1 p-1">all trustatrader.......</p>
            
       </div> 

    </div>
</section>

<section>

     <div class='flex flex-row justify-between bg-white w-3/4  ml-16   mt-3'>

        <p class=' my-2'>findout more........  </P>

        <div class='  w-1/4 p-2  bg-white shadow '>
        <p class='  my-2'>guarantee</p>
        </div>

    </div>
</section>

<section>
    <div class=' bg-white shadow mt-3 ml-16'>
        <h2 class=' capitalize font-bold text-black  tracking-widest'>profile</h2>
            <p class='  my2'>.....company profile........</p>
        <h2 class=' capitalize font-bold text-black tracking-widest'>Qualifications</h2>
            <p class='my2 '>.....Qualification list........</p>
    
    </div>
    <div class='mt-3 ml-16 bg-white shadow'>
        <h2 class='capitalize font-bold text-black  tracking-widest'>photos & vid's</h2>
            <p class=' my2'>.....photo's & vid's........</p>
        <h2 class=' capitalize font-bold text-black  tracking-widest'>Insurance Details</h2>
            <p class=' my2'>.....details........</p>
    </div>
</section>
<section>
    <div class='mt-3 p-2 ml-16 bg-white shadow'>
        
        <div class="flex flex-row justify-around">
            <div class='flex flex-col'>
                <p class='my-2'>text.....</p>
                <div class=' bg-gray-500  '>see how it works </div>

            </div>
            <div class='flex flex-col'>
                <h2 class='capitalize font-bold text-gray-900  tracking-widest'>Useful links</h2>
                <div>about us</div>
                <div>help and advice</div>
                <div>news</div>
                <div>customer gurantee</div>
            </div>
            <div class='flex flex-col'>
                <div>trade associ</div>
                <div>trade directory</div>
                <div>payment ser</div>
            </div>
            <div class='flex flex-col'>
                <div>privacy policy</div>
                <div>disclaimer</div>
                <div>social pages</div>
            </div>

            <div class='flex flex-col'>
                <div>adversing</div>
                <div>contact us</div>
                <div>terms </div>
            </div>
        </div>

        </div>
        <div class='mt-3 ml-16 bg-white'>
             <div class="flex justify-between ...">
                 <div class="order-last">app store</div>
                 <div>social media platform</div>
                 <div>google play</div>
                </div> 
         </div>
        <div class='mt-3 ml-16 bg-white'></div>
    </div>
</section>

@endsection