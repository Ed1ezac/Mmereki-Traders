<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    //
    public function index(){
        return view('dashboard.membership');
    }

    public function cancel(){
        //
    }

    public function subscribe(){
        //To payment form
        return view('dashboard.payment.pay');
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
