<?php

namespace App\Http\Controllers;

use App\Models\Trade;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\TradeQualification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ImageUploadRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Http\Requests\DocumentUploadRequest;

class CompanyController extends Controller
{
    public function edit(){
        $company = Company::forUser(Auth::user());
        $qualifications = TradeQualification::forUser(Auth::user());
        return view('dashboard.edit-profile' ,compact('company', 'qualifications'));
    }

    public function update(CompanyUpdateRequest $request){
        $company = Company::find($request->id);
        $company->updateRecord($request->validated());
        
        return back()->with('status', 'Your company profile has been updated successfully!');
    }

    public function uploadLogo(ImageUploadRequest $request){
        $path = $request->file('file')->store('images');
        $company = Company::forUser(Auth::user());
        $company->updateLogo($path);

        return back()->with('status', 'Your Logo has been updated successfully.');
    }

    public function deleteCompany(){
        //post
    }

    ///---------------Admin
    public function adminCompaniesList(){
        $companies = Company::latest()->take(8)->get();

        return view('admin.traders.companies', compact('companies'));
    }

    public function adminCompanyDetail($id){
        $company = Company::find($id);

        return view('admin.traders.company-details', compact('company'));
    }
    
}