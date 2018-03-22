<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();
        return view('home',compact('users'));
    }

    public function postAdminAssignRoles(Request $request)
    {
        $user = User::where('email',$request['email'])->first();
        $user->roles()->detach();
        if($request['role_user']){
            $user->roles()->attach(Role::where('name','User')->first());
        }
        if($request['role_admin']){
            $user->roles()->attach(Role::where('name','Admin')->first());
        }
        return redirect()->back();
    }



}
