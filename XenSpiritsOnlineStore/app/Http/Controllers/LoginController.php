<?php

namespace App\Http\Controllers;
use App\Models\Shopping_session;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
               $role_name = DB::table('roles')->where('id',$account->role_id)->value('name'); // lấy ra role name của account hiện tại

               if($account->staff_id != null) // email dang nhap la email quan tri vien
                  {
                     if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                      }
                     $_SESSION['adminlogin'] = "AdminLogged";
                     $_SESSION['login_status'] = "Logged";
                     
                       //lấy ra thông tin người dùng
                       $account = Account::where("email", $account->email)->first();
                       $user = Staff::where("id", $account->staff_id)->first();
                       $_SESSION["role_name"] = $role_name;
                       $_SESSION["staff_email"] = $account->email;
                       $_SESSION["staff_name"] = $user->full_name;
                       //
                     return redirect(route('foradmin.admin_home')); 
                  }
               else //email dang nhap la email khach hang
                  {
                     if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                      }
                     $_SESSION['clientlogin'] = "ClientLogged";
                     $_SESSION['login_status'] = "Logged";
                     
                     //lấy ra thông tin người dùng
                     $account = Account::where("email", $account->email)->first(); // account dang duoc dang nhap hop le
                     $user = customer::where("id", $account->client_id)->first();
                     $shopping_session = Shopping_session::where('account_id',$account->id)->first();
                     $_SESSION["account_id"] = $account->id;
                     $_SESSION["client_email"] = $account->email;
                     $_SESSION["client_name"] = $user->full_name;
                     $_SESSION["client_phone"] = $user->phone;
                     $_SESSION["client_address"] = $user->address;
                     $_SESSION["client_image"] = $user->image;
                     $_SESSION["client_id"] = $user->id;
                     $_SESSION["shopping_session"] = $shopping_session;
                     return redirect(route('home'));  
                      
                  }
            }
         }
         
       }
       return redirect('http://localhost:8000/login')->withSuccess('Email hoặc mật khẩu không chính xác');
    }

    public function ShowLogin()
    {
     return view('login');
    }

    public function ShowRegister()
    {
      
       return view('register');
    }

    public function Logout()
    {
      if(session_status() == PHP_SESSION_NONE)
      {
           session_start();
      }

      $_SESSION['adminlogin'] = '';
      $_SESSION['login_status'] = '';
      return redirect(route('showlogin'));
    }
}
