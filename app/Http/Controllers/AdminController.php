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
        Auth::user()->assignRole([User::Moderator, User::Administrator]);
        return back()->with('status', 'Super-Admin priviledges have been granted to your account!');
    }

    //for the Future!
    public function giveUserRole(){

    }
    
}
