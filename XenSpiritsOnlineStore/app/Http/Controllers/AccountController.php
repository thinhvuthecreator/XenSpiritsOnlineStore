<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Role;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AccountController extends Controller
{
    public function ShowAccount()
    {
        $Accounts = Account::all();
        return view('forAdmin.Account.admin_account', compact('Accounts'));
    }
    public function AddAccount()
    {   $staffs = Staff::all();
        $roles = Role::all();
        return view('forAdmin.Account.add',compact('staffs','roles'));
    }
    public function AddAccountData(Request $request)
    {   
        $rules = [
            'email_input' => 'required|email',
            'password_input' =>'required|min:8'
        ];
        $messages = [
            'required' => 'Trường này không được bỏ trống',
            'email' =>'Email không hợp lệ',
            'min' => 'Mật khẩu phải có độ dài tối thiểu là 8'
        ];
        $request->validate($rules,$messages);

        $role_id = DB::table('roles')->where('name',$request->role_input)->value('id');
        $staff_id = DB::table('staff')->where('full_name',$request->staff_input)->value('id');
        Account::create([
            'email' => $request->email_input,
            'password' => $request->password_input,
            'role_id' => $role_id,
            'staff_id' => $staff_id
        ]);

        return redirect()->back();
    }
    public function EditAccount()
    {
        
    }
    public function EditAccountData()
    {
        
    }
}
