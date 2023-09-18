<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function ShowRole()
    {
        return view('forAdmin.Role.admin_role');
    }
    public function AddRole()
    {
        return view('forAdmin.Role.add');
    }
    public function AddRoleData()
    {
        return 'them du lieu';
    }
}
