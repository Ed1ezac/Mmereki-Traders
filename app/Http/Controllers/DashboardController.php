<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Membership;
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

        return view('dashboard.home', compact('company', 'membership'));
    }

    public function settings(){
        
        return view('dashboard.settings');
    }

    
}
