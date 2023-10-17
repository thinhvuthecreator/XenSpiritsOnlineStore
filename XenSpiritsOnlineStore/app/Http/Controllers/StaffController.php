<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function ShowStaff()
    {
        $staffs = Staff::all();
        return view('forAdmin.Staff.admin_staff',compact('staffs'));
    }
    public function AddStaff()
    {

        $roles = Role::all();
        return view('forAdmin.Staff.add',compact('roles'));
    }
    public function AddStaffData(Request $request)
    {
        $rules = [
            'staff_name_input' => 'required',
            'staff_image_input'=> 'image',
            'citizen_id_input' => 'required|numeric|digits:12',
            'phone_input' => 'required|numeric|digits:10',
            'staff_birth_input' => 'required'
        ];
        $messages = [
            'required' => 'Trường này không được để trống',
            'image' => 'Đây không phải là file ảnh ! Vui lòng chọn file ảnh',
            'numeric' => 'Vui lòng nhập số',
            'phone_input.digit' => 'Số điện thoại không hợp lệ !',
            'citizen_id_input.digit' => 'Số căn cước không hợp lệ !'

        ];
        $request->validate($rules,$messages);

        $image = $request->file('staff_image_input');
        $storedPath = $image->move('Resource/staff_Images', $image->getClientOriginalName());

        Staff::create([
            'full_name' => $request->staff_name_input,
            'image' => $image->getClientOriginalName(),
            'phone' => $request->phone_input,
            'citizen_id' => $request->citizen_id_input,
            'date_of_birth' => $request->staff_birth_input,
        ]);

        
        return redirect()->back();
        // echo 'citizen id : '.str::length($request->citizen_id_input)."\n";
        // echo 'phone : '.str::length($request->phone_input);
    }

    public function EditStaff($id)
    {
        $roles = Role::all();
        $staff = DB::table('staff')->where('id',$id)->first();
        return view('forAdmin.Staff.edit',compact('roles','staff'));
    }

    public function EditStaffData(Request $request)
    {
        $rules = [
            'staff_name_input' => 'required',
            'staff_image_input'=> 'image',
            'citizen_id_input' => 'required|numeric|digits:12',
            'phone_input' => 'required|numeric|digits:10',
            'staff_birth_input' => 'required'
        ];
        $messages = [
            'required' => 'Trường này không được để trống',
            'image' => 'Đây không phải là file ảnh ! Vui lòng chọn file ảnh',
            'numeric' => 'Vui lòng nhập số',
            'phone_input.digit' => 'Số điện thoại không hợp lệ !',
            'citizen_id_input.digit' => 'Số căn cước không hợp lệ !'

        ];

        $request->validate($rules,$messages);
        $image_update ="";
        if($request->file('staff_image_input')) // có hành động đổi ảnh
        {
            $image = $request->file('staff_image_input');
            $storedPath = $image->move('Resource/staff_Images', $image->getClientOriginalName());
            $image_update = $image->getClientOriginalName();
        }
        else // không có hành động đổi ảnh
        {
            $current_image = DB::table('staff')->where('id',$request->staff_id_input)->value('image');
            $image_update = $current_image;
        }    
        

        DB::table('staff')->where('id',$request->staff_id_input)->update([
            'full_name' => $request->staff_name_input,
            'image' => $image_update,
            'phone' => $request->phone_input,
            'citizen_id' => $request->citizen_id_input,
            'date_of_birth' => $request->staff_birth_input
        ]);
        return redirect(route('foradmin.staff'));
    }
}
