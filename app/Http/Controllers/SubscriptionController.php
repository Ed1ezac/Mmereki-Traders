<?php

namespace App\Http\Controllers;

use \Carbon\Carbon;
use App\Models\User;
use App\Models\Company;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    //

    public function subscribe(Request $request){
        $company = Company::forUser(Auth::user());
        $amt = $request->get('amount');
        $expiry = $this->expiryForPlan($amt);
        
        Subscription::create([
            'membership_id' => $company->membership->id,
            'company_id' => $company->id,
            'type' => Subscription::Standard,
            'amount' => $amt,
            'expiry' => $expiry,
        ]);

        return redirect('/membership')->with('status', 'You have subscribed successfully.');
    }

    private function expiryForPlan($amount){
        $time_now = Carbon::now('+2.00');
        switch ($amount){
            case 90:
                return $time_now->addDays(30);//1 month
            case 162:
                return $time_now->addDays(90);
            case 300:
                return $time_now->addDays(365);
        }
    }
}
