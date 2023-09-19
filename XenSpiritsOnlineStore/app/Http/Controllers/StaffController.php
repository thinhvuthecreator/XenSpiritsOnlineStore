<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function ShowStaff()
    {
        return view('forAdmin.Staff.admin_staff');
    }
    public function AddStaff()
    {
        return view('forAdmin.Staff.add');
    }
    public function AddStaffData()
    {
        return 'them du lieu';
    }
}
