<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function Login(Request $request)
    {
       if($request->username_input == "admin")
       {
        return redirect(route('foradmin.admin_home'));
       }
    }

    public function ShowRegister()
    {
       return view('register');
    }
}
