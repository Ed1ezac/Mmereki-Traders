<?php

namespace App\Http\Controllers;

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
}
