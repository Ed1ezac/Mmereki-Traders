<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchProcessor extends Controller
{
    //

    public function search(){
        return view('search');
    }

    public function results(){
        return view('results');
    }

    public function processSearchRequest(Request $request){
        //dd($request);
        //get data from request
        //process
        //results
        return redirect('/results');
    }

    public function tradersDetails(){
        return view('trader-details');
    } 


    public function invalidDetails(){
        return view('invalid-search');
    }
    
}
