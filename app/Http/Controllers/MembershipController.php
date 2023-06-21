<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MembershipController extends Controller
{
    //
    public function index(){
        $company = Auth::user()->company;
        $membership = Membership::forCompany($company);
        //($membership);
        $currentSub = Subscription::forCompany($company)->latest()->first(); 
        $allSubs = Subscription::forCompany($company)->latest()->paginate(8);

        return view('dashboard.membership', compact('membership','currentSub','allSubs'));
    }

    public function cancel(){
        //
    }

    public function subscribe(Request $request){
        //To payment form
        $amount = $request->get('price');
        return view('dashboard.payment.pay', compact('amount'));
    }

    //admin
    public function adminRevokeMembership($id){
        $member = Membership::find($id);
        $member->updateStatus(Membership::Revoked);
        return back()->withErrors('Membership Revoked!');
    }

    public function adminSetMembershipAsExpired($id){
        $member = Membership::find($id);
        $member->updateStatus(Membership::Expired);
        return back()->withErrors('Membership Revoked!');
    }
}
