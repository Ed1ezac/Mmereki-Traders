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
            'intro' => ['required', 'string', 'max:160'],
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
            'expiration' => $time_now->addDays(184),//6 months
        ]);
    }
}