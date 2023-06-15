<?php

namespace App\Http\Controllers;

use App\Models\Trade;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;

class SearchProcessor extends Controller
{

    public function search(){
        return view('search');
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

    public function results(){
        return view('results');
    }

    public function processSearchRequest(SearchRequest $request){
        $results;
        $comment ="";
        $trader = $request->input('trader');
        $location = $request->input('location');
        $trade = Trade::withName($trader)->first();
        
        if(isset($trade)){
            $results = Company::withTrade($trade)
                        ->atLocation($location)
                        ->paginate(8);
        }else{
            //search by name
            $results = Company::withName($trader)
                            ->atLocation($location)
                            ->paginate(8);
            $comment = "Showing traders with name: ".$trader;
        }
        //worst case-scenario
        if($results->count() < 1 && isset($trade)){
            $results = Company::withTrade($trade)->paginate(8);
            $comment = "No results for \"".$location."\". Showing all traders with trade: ".$trade->name;
        }
        
        return view('results', compact('results', 'trader', 'location', 'comment'));
    }

    public function traderDetails($id){
        $company = Company::find($id);
        return view('trader-details', compact('company'));
    } 


    private function findCompanyByTrade(){
        Company::where([
            ['location', 'LIKE', '%'.$request->input('location').'%']
            ])->whereHas('trades', function ($query) use ($trade) {
                $query->where('trade_id', '=', $trade->id);
            })->paginate(8);
    }

    private function findCompanyByName(){
        Company::where([ 
            ['name', 'LIKE', '%'.$request->input('trader').'%'],
            ['location', 'LIKE', '%'.$request->input('location').'%']
        ])->paginate(8);
    }

    /*public function calPoints($ops){
        //int x - record x,
        //'+' - record new score that is sum of two prev score
        //'D' - record new score that is double prev score
        //'C' - remove prev score
        $data = array();
        for($i = 0; $i < count($ops); $i++){
            switch ($ops[i]){
                case "C":
                   array_pop($data[count($data)-1]);
                break;
                case "D":
                    $data[] = 2 * $data[count($data)-1];
                    break;
                case "+":
                    $data[] = $data[count($data)-1] + $data[count($data)-2];
                    break;
                default:
                    $data[] = (int)$ops[i];
                break;    
            }
        }
        $sum = 0;
        
        for($i =0; $i < count($data); $i++){
            $sum += $data[i];
            //var_dump()
        }
        return $sum;
    }

    public function isValid($s){
        // ()[]{} , {{[()]}} , {(]}) , {(]})} , {(])}
        if(strlen($s) < 1 || strlen($s) > 104){ return false; }
        $stack = new \Ds\Stack();
        $arr = str_split($s);
        $top;

        for($i=0; $i<count($arr); $i++){
            $current = $arr[$i];
            if($current == "(" || $current == "[" || $current == "{"){
                $stack->push($current);
            }else{
                if($stack->isEmpty()){
                    return false;
                }else{
                    $top = $stack->peek();
                    if($current == ")" && $top == "(" ||
                       $current == "]" && $top == "[" ||
                       $current == "}" && $top == "{"){
                        $stack->pop();
                    }else{
                        return false;
                    }
                }
            }
        }
        return $stack->isEmpty();
    }*/
    
}
