<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\AdminRoleRequest;

class AdminController extends Controller
{
    //
    public function createFirstAdmin(AdminRoleRequest $request){
        Auth::user()->assignRole(User::Administrator);
        return back()->with('status', 'Super-Admin privileges have been granted to your account!');
    } 

    //for the Future!
    public function giveUserRole(){
        //Auth::user()->assignRole(User::Trader);
        return back()->withErrors('Due Roles granted!');
    }
    
}
