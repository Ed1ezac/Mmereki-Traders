<?php

namespace App\Http\Controllers;

use App\Models\Trade;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CompanyUpdateRequest;

class CompanyController extends Controller
{
    //
    public function edit(){
        $company = Company::forUser(Auth::user());
        return view('dashboard.edit-profile' ,compact('company'));
    }

    public function update(CompanyUpdateRequest $request){
        $company = Company::find($request->id);
        $company->updateRecord($request->validated());
        
        return back()->with('status', 'Your company profile has been updated successfully!');
    }

    public function delete(){
        //post
    }

    //drifting
    

}
