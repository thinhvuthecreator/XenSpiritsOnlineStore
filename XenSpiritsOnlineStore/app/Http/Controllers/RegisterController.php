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
        $rules = [
            'email_input' => 'required|email',           
            'password_input' => 'required|min:8',
            'passwordconfirm_input' => 'required|same:password_input'
        ];
        $messages = [
            'required' => 'Trường này bắt buộc phải nhập',
            'email' => 'Email không hợp lệ',
            'min' => 'Mật khẩu phải có độ dài tối thiểu là 8',
            'same' => 'Mật khẩu xác nhận không khớp'
        ];

        $request->validate($rules,$messages);

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
