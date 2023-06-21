<?php

namespace App\Http\Controllers;

use App\Models\Trade;
use App\Models\Company;
use App\Models\Location;
use App\Models\Membership;
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
        $trades = Trade::all('id', 'name');
        $company = Company::forUser(Auth::user());
        $locations = Location::get(['id', 'name']);
        $my_trades = [];
        $qualifications = TradeQualification::forUser(Auth::user());
        //--
        foreach($company->trades()->get() as $item){
            $my_trades[] = Trade::find($item->id, ['id', 'name']);
        }
        return view('dashboard.edit-profile' , compact('company', 'locations','qualifications','trades', 'my_trades'));
    }

    public function update(CompanyUpdateRequest $request){
        //todo: onsider try-catch
        $company = Company::find($request->id);
        $company->updateRecord($request->validated());
        $company->updateTrades($request->get('trades'));
        
        return back()->with('status', 'Your company profile has been updated successfully!');
    }

    public function updateIntro(Request $request){
        $company = Auth::user()->company;
        $company->update([
            'intro' => $request->get('intro')
        ]);
        return redirect('/home')->with('status', 'Intro updated successfully.');
    }

    public function updateMobile(Request $request){
        $company = Auth::user()->company;
        $company->update([
            'mobile' => $request->get('mobile')
        ]);
        return redirect('/home')->with('status', 'Mobile updated successfully.');
    }

    public function updateAbout(Request $request){
        $company = Auth::user()->company;
        $company->update([
            'about' => $request->get('about')
        ]);
        return redirect('/home')->with('status', 'About updated successfully.');
    }

    public function updateTel(Request $request){
        $company = Auth::user()->company;
        $company->update([
            'telephone' => $request->get('telephone')
        ]);
        return redirect('/home')->with('status', 'Telephone updated successfully.');
    }

    public function updateLocation(Request $request){
        $company = Auth::user()->company;

        $company->update([
            'location_id' => $request->get('location')['id']
        ]);
        return redirect('/home')->with('status', 'Location updated successfully.');
    }

    public function uploadLogo(ImageUploadRequest $request){
        $company = Company::forUser(Auth::user());
        if($company->logo != null){
            //delete previous file
            try{
                $this->deleteLogoFile($company->logo);
            }catch(Throwable $t){
                return back()->withErrors('An error occurred while trying to delete the previous logo. Please try again.');
            }
        }

        $path = Storage::disk('public')->putFile('/images', $request->file('file')); 
        $company->updateLogo($path);

        return back()->with('status', 'Your Logo has been updated successfully.');
    }

    private function uploadNewLogo(){
        $req = request();
        return $req->file('file')->store('images');
    }

    public function removeLogo(){
        $company = Company::forUser(Auth::user());
        if($company->logo != null){
            try{
                //delete file
                $this->deleteLogoFile($company->logo);
            }catch(Throwable $t){
                return back()->withErrors('An error occurred when deleting the logo. Please try again.');
            }
            //remove record
            $company->updateLogo(Null);
            return back()->with('status', 'Logo removed successfully.');
        }
        return back()->withErrors('There is no logo to remove.');
    }

    private function deleteLogoFile($path){
        Storage::disk('public')->delete($path);
    }

    public function deleteCompany(){
        //post
    }

    //--------------Admin
    public function adminCompaniesList(){
        $companies = Company::latest()->take(8)->get();
        return view('admin.companies.list', compact('companies'));
    }

    public function adminCompanyDetail($id){
        $company = Company::find($id);
        return view('admin.companies.company-details', compact('company'));
    }
    
    public function adminVerifyCompany(Request $request){
        $company = Company::find($request->input('id'));
        $company->updateVerification(Company::Verified);
        $company->membership->update(['status' => Membership::Accepted]);
        return back()->with('status', $company->name.' is now a verified Mmereki Trader!');
    }

    public function adminUnverifyCompany(Request $request){
        $company = Company::find($request->input('id'));
        $company->updateVerification(Company::Pending);
        $company->membership->update(['status' => Membership::Pending]);
        return back()->withErrors($company->name.'\'s verification has now been reverted!');
    }

}