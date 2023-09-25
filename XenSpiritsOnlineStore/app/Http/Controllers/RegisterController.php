<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Models\Account;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function Register(Request $request)
    {
        Account::create([
            'email' => $request->email_input,
            'password'=>$request->password_input,
            'role_id'=> 1
        ]);
        return redirect('/register')->withSuccess('Tạo tài khoản thành công');
    }

    public function ShowLogin(){
        return view('login');
    }
}
