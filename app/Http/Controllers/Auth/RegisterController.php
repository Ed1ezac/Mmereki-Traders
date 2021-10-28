<?php

namespace App\Http\Controllers\Auth;

use \Carbon\Carbon;
use App\Models\User;
use App\Models\Company;
use App\Rules\EmptyField;
use App\Models\Membership;
use App\Models\CompanyTrades;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
   
    private $user;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //dd($data);

        return Validator::make($data, [
            'company-name' => ['required', 'string', 'max:100'],
            'intro' => ['required', 'string', 'max:200'],
            'address' => ['required','string', 'max:100'],
            'location' => ['required','string', 'max:60'],
            'trades' => ['required',],
            'tel' => ['required', 'numeric', 'min:6'],
            'mobile' => ['required', 'numeric', 'min:8'],
            'birthday' => [new EmptyField],
            'company-email'=> ['required', 'email', 'unique:companies,email'],
            //
            'first-name' => ['required', 'string', 'max:100'],
            'last-name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['required', 'accepted']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        //dd($data);
        DB::transaction(function() use ($data) {

            $this->user = User::create([
                'name' => $data['first-name'].' '.$data['last-name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            //
            $company = $this->registerCompany($this->user->id, $data);
            //trades
            $this->registerCompanyTrades($company->id, $data);
            //
            $this->registerMembership($company->id);
        }, 5);

        return $this->user;
    }

    private function registerCompany($userId, array $data){
        return Company::create([
            'user_id' => $userId,
            'name' => $data['company-name'],
            'intro' => $data['intro'],
            'email' => $data['company-email'],
            'location' => $data['location'],
            'address' => $data['address'],
            'telephone' => $data['tel'],
            'mobile' => $data['mobile'],
        ]);
    }

    private function registerCompanyTrades($companyId, array $data){
        $trades = $data['trades'];
        $tradeIds = explode(',', $trades);

        foreach($tradeIds as $tradeId){
            CompanyTrades::create([
                'company_id' => $companyId,
                'trade_id' => $tradeId,
            ]);
        }
    }

    private function registerMembership($companyId){
        $time_now = Carbon::now('+2.00');
        $memb_id = $companyId;
        if($memb_id < 100){
            //if the company ID is less than 100 we add
            //leading zeros to it: 5 becomes 005, 23 becomes 023...
            $memb_id = sprintf('%03d', $memb_id);
        }
        //Absent fields are handled by Defaults
        return Membership::create([
            'code' => 'MT'.$memb_id,
            'company_id' => $companyId,
            'status' => Membership::Pending,
            'expiration' => $time_now->addDays(184),//6 months
        ]);
    }

}
/*----
try{
    $user = User::create([
        'name' => $request->get('name').' '.$request->get('surname'),
        'email' => $request->get('email'),
        'contact' => $request->get('mobile'),
        'pw_len' => strlen($request->get('password')),
        'password' => Hash::make($request->get('password')),
    ]);
}catch(\Illuminate\Database\QueryException $e){
    $errorCode = $e->errorInfo[1];
    if($errorCode == 1062){
        // houston, we have a duplicate entry problem
        return redirect()->back()
            ->withErrors('The email you entered has been used to create an account. Please enter a different one.');
    }
}

if($user->id != null){
    //Register the Company Next
    $company = Company::create([
        'user_id' => $user->id,
        'name' => $request->get('company'),
        'company_size' => $request->get('company-size'),
        'location' => $request->get('location'),
        'post_address' => $request->get('postal_address').', '.$request->get('post_location'),
        'telephone' => $request->get('telephone'),
        'mobile' => $request->get('mobile'),
    ]);

    //------Bonus Bid Credit
    //kick start them with 5 bids
    BidCredit::create([
        'company_id' => $company->id,
        'balance' => 30000000,
    ]);

    //----- TRADES  !!!!!!!!
    $trades = $request->get('trades');
    $tradeIds = explode(',', $trades);

    foreach($tradeIds as $tradeId){
        CompanyTrades::create([
            'company_id' => $company->id,
            'trade_id' => $tradeId,
        ]);
    }

    //-Create the company's Membership
    $time_now = Carbon::now('+2.00');//timezoned current time
    $memb_id = $company->id;
    if($memb_id < 100){
        //check if the company ID is less than 100 so that we add
        //leading zeros to it: 5 becomes 005, 23 becomes 023...
        $memb_id = sprintf('%03d', $memb_id);
    }

    //-----The *type* field is habndled by default value
    Membership::create([
        'membership_id' => 'TM'.$memb_id,
        'company_id' => $company->id,
        'status' => 'Pending',
        'expiration' => $time_now->addDays(184),//6 months
    ]);

    //Create a default Rating for the newly created Company: DEFAULT is 3.00
    //we only need the company id, the rest is handled by the defaults.
    Rating::create([
        'company_id' => $company->id,
    ]);

    $user->company_id = $company->id;
    $user->assignRole('tradesman');//role
    $user->notify(new Welcome());

    $user->save();//update user
    $this->sendVerificationEmail($user);
*/