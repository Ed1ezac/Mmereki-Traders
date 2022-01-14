<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $company = Comapany::forUser(Auth::user());
        return view('dashboard.home');
    }
}
