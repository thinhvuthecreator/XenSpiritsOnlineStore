<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function ShowAccount()
    {
        $Accounts = Account::all();
        return view('forAdmin.Account.admin_account', compact('Accounts'));
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
