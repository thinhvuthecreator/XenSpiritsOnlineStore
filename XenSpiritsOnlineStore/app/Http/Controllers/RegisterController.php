<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function Register(Request $request)
    {
        dd($request->all());
    }

    public function ShowLogin(){
        return view('login');
    }
}
