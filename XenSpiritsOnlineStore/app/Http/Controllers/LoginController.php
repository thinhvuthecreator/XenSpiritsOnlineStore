<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
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
         if($request->email_input == $account->email)
         {
            $hashedPassword = $account->password;
            // check if password input match the password hashed
            if (Hash::check($request->password_input, $hashedPassword)) {
              // password match
               if($request->email_input == "thinhvuh@gmail.com") // email dang nhap la email quan tri vien
                  {
                     session_start();
                     $_SESSION['adminlogin'] = "AdminLogged";

                     return redirect(route('foradmin.admin_home')); 
                  }
               else //email dang nhap la email khach hang
                  {
                        return redirect(route('home'));        
                  }
            }
         }
         
       }
       return redirect('http://localhost:8000/login')->withSuccess('Email hoặc mật khẩu không chính xác');
    }

    public function ShowLogin()
    {
      
       $_SESSION["adminlogin"] = "AdminNotLogged";
       return view('login');
    }

    public function ShowRegister()
    {
      
       return view('register');
    }
}
