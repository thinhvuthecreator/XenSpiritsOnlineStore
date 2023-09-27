<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function ShowAdmin()
    {
        return view('/forAdmin/admin_home');
    }

    public function LogOut()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
          }
          $_SESSION["adminlogin"] = "AdminNotLogged";
        return redirect('/login');
    }
}
