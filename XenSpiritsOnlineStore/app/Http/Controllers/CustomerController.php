<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function ShowCustomer()
    {
        $customers = customer::all();
        return view('forAdmin.customer.admin_customer',compact('customers'));
    }

    public function ShowProfile(Request $request)
    {
        return view('forClient.profile');
    }

    public function ChangeProfile(Request $request)
    {
        $rules = [
            'full_name_input' => 'required',
            'phone_input' => 'required|numeric|digits:9',
            'address_input' => 'required',
        ];
        $messages = [
            'required' => 'Trường này không được để trống',
            'numeric' => 'Vui lòng nhập số',
            'phone_input.digits' => 'Số điện thoại không hợp lệ !',
        ];
        $request->validate($rules,$messages);
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
          }
        DB::table('customers')->where('id', $_SESSION["client_id"])->update([
            'full_name' => $request->full_name_input,
            'phone' => $request->phone_input,
            'address' => $request->address_input
        ]);
        
        return redirect()->back();
    }

    public function ChangePassword(Request $request)
    {
       return "posted";
    }
}

