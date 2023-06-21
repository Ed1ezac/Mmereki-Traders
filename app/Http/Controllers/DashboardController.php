<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Location;
use App\Models\Membership;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $company = Company::forUser(Auth::user());
        $membership = Membership::forCompany($company);
        $locations = Location::get(['id', 'name']);

        return view('dashboard.home', compact('company', 'locations', 'membership'));
    }


    
    public function settings(){
        $userName = Auth::user()->name;
        $email = Auth::user()->email;
        return view('dashboard.settings', compact('userName', 'email'));
    }

    
}
