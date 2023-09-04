<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function Login()
    {
       
    }

    public function ShowRegister()
    {
       return view('register');
    }
}
