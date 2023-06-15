<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MembershipController extends Controller
{
    //
    public function index(){
        $membership = Membership::forCompany(Auth::user()->company);
        //($membership);
        return view('dashboard.membership', compact('membership'));
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
