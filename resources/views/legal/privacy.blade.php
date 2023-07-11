@extends('layouts.landing-header')

@section('content')
<section class="lg:max-w-7xl lg:mx-auto px-4 sm:px-8 pb-8">
    <div>
        <h3 class="text-xl font-semibold text-gray-900">Privacy Policy</h3>
        <hr/>
        <p class="mt-2">
            At Mmereki we believe in protecting our users’ personal data against prying eyes that may use 
            it for foul means. That is why we have a clear policy on how we collect and use data for 
            anyone who has any questions and queries to refer to.
        </p>
        <p class="mt-2">
            This Privacy Policy describes the type of information we collect from you, why we collect that 
            information and how we use it to deliver our services to you. You can contact us for more 
            information regarding this Privacy Policy.
        </p>
    </div>
    <ol class="mt-3 mb-6 pt-3" type="1">
        <!--- Info Collected --->
        <li><strong class="text-xl">1.What Information do we collect from you?</strong>
            <br>
            When you register an account with us, we ask you for the following information:
            <ul class="ml-3" style="list-style-type:disc;">
                <li>Your full names</li>
                <li>A valid email address</li>
                <li>Your contact number</li>
                <li>A password</li>
            </ul>
            <p class="mt-2">
                Note that this information (Your names and email address) may be attained from other 
                third-party providers like Facebook, Twitter or Google when you choose to login with 
                them. By doing so you authorize us to collect your information, such as your username, 
                encrypted access credentials, and other information, that may be available on or 
                through your social media account. This information includes but is not limited to 
                your name, profile picture, country, e-mail address, date of birth and gender.
            </p>
            <p class="mt-2">
                The email address and password you provide are used for authentication purposes. Your 
                password is stored as an encrypted string in our databases and will never be known or 
                determined by anyone (including our technicians and system administrators) other than 
                you. Your email address is also used in case you forget your user password to send you 
                a password reset link and recover your account.
            </p>
            <p class="mt-2">
                Your email address or your contact number may be used as a contact detail to the Trade 
                whom you accept to do your job. All other trades who show interest in a job you post on 
                our website will never see your contact details. Even if you accepted a Trade to do a 
                job previously, you will remain anonymous to them when you post a new job for bidding. 
            </p>
            <p class="mt-2">
                When you leave a review for a Trade on a job they did for you, we ask you to provide us 
                with the following: 
            </p>
            <ul class="ml-3" style="list-style-type:disc;">
                <li>Your name; full or otherwise</li>
                <li>Your email address</li>
                <li>Contact number: either a cell number or a telephone number or both</li>
            </ul>
            <p class="mt-2">
                We use this information to contact users about their reviews and to make sure they are 
                genuine.
            </p>
            <p class="mt-2">
                All reviews are posted on <a href="/" class="my-link">https://tradesmen.co.bw</a>. The only 
                information visible on the review post is your name, rating and comment. Your contact 
                details will never be disclosed to any Trade regarding your review.
            </p>
        </li>

        <!--- Info Usage --->
        <li class="mt-6"><strong class="text-xl">2.How do we use this information?</strong>
            <br>
            We may pass your information to a limited number of third parties for the following reasons: 
            <ul class="ml-3" style="list-style-type:disc;">
                <li>To deliver the services you’ve asked for including passing details to payment providers.</li>
                <li>For legal or regulatory purposes including fraud prevention.</li>
                <li>In the event of a company merger or complete sale of part or all of our assets.</li>
            </ul>
            <p class="mt-2">
                If you have submitted feedback on a Trade, we will keep a record of your personal information 
                for as long as the review remains on the website. Keeping a record of all reviews allows 
                us to monitor feedback and combat fraudulent activity
            </p>
            <p class="mt-2">
                When a Trade is accepted for a job by a consumer, we share the Trade’s business information 
                (name, full address, email address and phone number) to fulfil our contractual obligations 
                to the consumer. In the event of a dispute between a consumer and a Trade, we will make 
                available any other personal information we hold on a Trade’s Business that is pertinent 
                to that dispute and may, in our judgement assist in the fair and reasonable resolution 
                of that dispute.
            </p>
        </li>
    </ol>
    <p class="mt-2">
        At Mmereki we work to protect the security of your information during transmission by using 
        Secure Sockets Layer (SSL) software, which encrypts information you input in any of our 
        website forms or fields. If, at any time, you feel that we haven’t processed your data 
        fairly or you’re not satisfied with how we’ve handled your personal information, you can 
        contact us with regard to this.
    </p>
</section>

@include('components.footer-large')
@endsection