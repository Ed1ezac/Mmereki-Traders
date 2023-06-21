<?php

namespace App\Http\Controllers;

use App\Models\Trade;
use App\Models\Company;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;

class SearchProcessor extends Controller
{

    public function search(){
        $locations = Location::get(['id', 'name']);
        return view('search', compact('locations'));
    }

    public function processSearchRequest(SearchRequest $request){
        $results;
        $comment ="";
        $trader = $request->input('trader');
        $location = $request->input('location');
        $trade = Trade::withName($trader)->first();
        $locations = Location::get(['id', 'name']);

        if(isset($trade)){
            $results = Company::withTrade($trade)
                        ->withActiveMembership()
                        ->withActiveSubscription()
                        ->atLocation($location['id'])
                        ->paginate(6);
        }else{
            //search by name
            $results = Company::withName($trader)
                            ->withActiveMembership()
                            ->withActiveSubscription()
                            ->atLocation($location['id'])
                            ->paginate(6);
            $comment = "Showing trades with name: ".$trader;
        }

        //-We haven't found a company with name 'trader' at 'location'
        //-And we also haven't found a company with trade 'trader' at 'location' 
        //at worst case-scenario
        
        //-So we show all companies with trade 'trader' (needs patching: order by nearest first)
        if($results->count() < 1 && isset($trade)){
            $results = Company::withTrade($trade)
                        ->withActiveMembership()
                        ->withActiveSubscription()
                        ->paginate(6);
            $comment = "No results for \"".$location['name']."\". Showing all trades with trade: ".$trade->name;
        }
        //-So we show all companies with name 'trader'
        if($results->count() < 1 && isset($trader)){
            $results = Company::withName($trader)
                        ->withActiveMembership()
                        ->withActiveSubscription()
                        ->paginate(6);
            $comment = "No results for \"".$location['name']."\". Showing all trades with Name: ".$trader;
        }
        
        return view('results', compact('results', 'trader', 'location', 'locations', 'comment'));
    }

    public function about(){
        $trades = Trade::all();
        return view('info.about', compact('trades'));
    }

    public function terms(){
        return view('legal.terms');
    }

    public function privacy(){
        return view('legal.privacy');
    }

    public function refunds(){
        return view('legal.refunds');
    }

    public function companyDetails($id){
        $company = Company::find($id);
        return view('company-details', compact('company'));
    } 

}
