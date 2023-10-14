<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StaffController extends Controller
{
    public function ShowStaff()
    {
        $staffs = Staff::all();
        return view('forAdmin.Staff.admin_staff',compact('staffs'));
    }
    public function AddStaff(Request $request)
    {
        $roles = Role::all();
        return view('forAdmin.Staff.add',compact('roles'));
    }
    public function AddStaffData(Request $request)
    {
        // $rules = [
        //     'staff_name_input' => 'required',
        //     'staff_image_input'=> 'image',
        //     'citizen_id_input' => 'required|numeric|size:12',
        //     'phone_input' => 'required|numeric|size:10',
        //     'staff_birth_input' => 'required'
        // ];
        // $messages = [
        //     'required' => 'Trường này không được để trống',
        //     'image' => 'Đây không phải là file ảnh ! Vui lòng chọn file ảnh',
        //     'numeric' => 'Vui lòng nhập số',
        //     'phone_input.size' => 'Số điện thoại không hợp lệ !',
        //     'citizen_id_input.size' => 'Số căn cước không hợp lệ !'

        // ];
        // $request->validate($rules,$messages);

        // Staff::create([
        //     'full_name' => $request->staff_name_input,
        //     'main_image' => $request->staff_image_input,
        //     'phone' => $request->phone_input,
        //     'citizen_id' => $request->citizen_id_input,
        //     'date_of_birth' => $request->staff_birth_input,
        // ]);
           
        // return redirect()->back();
        echo str::length($request->citizen_id_input);
        echo "\n";
        echo str::length($request->phone_input);
    }
}
