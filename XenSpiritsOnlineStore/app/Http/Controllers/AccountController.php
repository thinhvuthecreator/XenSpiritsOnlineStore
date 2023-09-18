<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function ShowAccount()
    {
        return view('forAdmin.Account.admin_account');
    }
    public function AddAccount()
    {
        return view('forAdmin.Account.add');
    }
    public function AddAccountData()
    {
        return 'them du lieu';
    }
}
