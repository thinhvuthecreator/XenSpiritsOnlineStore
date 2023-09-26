<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    public function Login(Request $request)
    {
   
       $Accounts = Account::all();

       foreach($Accounts as $account)
       {
         //tim cach lay ra mat khau chua bi hash de dang nhap
         if($request->email_input == $account->email && $request->password_input == $account->password)
         {
            if($request->email_input == "thinhvuh@gmail.com")
            {
               return redirect(route('foradmin.admin_home'));
            }
            else{
               return redirect('http://localhost:8000/');
            }
         }
       }

       return redirect('http://localhost:8000/login');
    }

    public function ShowRegister()
    {
       return view('register');
    }
}
