<?php

namespace App\Http\Controllers;

use App\Models\Trade;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    //
    public function edit(){
        $company = Company::forUser(Auth::user());
        return view('dashboard.edit-profile' ,compact('company'));
    }

    public function update(){
        //post
    }

    public function delete(){
        //post
    }

}
