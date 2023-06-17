<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    public function editUser(){
        $user = Auth::user();
        return view('dashboard.settings', compact('user'));
    }

    public function updateUser(UserUpdateRequest $request){
        $user = User::find($request->input('id'));
        if($request->input('email') !== $user->email){
            $user->email_verified_at = null;
            $user->save();
        }
        $user->updateRecord($request->validated());

        return back()->with('status', 'Your user data has been updated successfully!');
    }

    //------- Administrator
    public function list(){
        $users = User::paginate(12);

        return view('admin.users.list', compact('users'));
    }

    public function makeModerator(){

    }

    public function makeAdministrator(){

    }
    
}
