<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function ShowAdmin()
    {
        return view('/forAdmin/admin_home');
    }
}
