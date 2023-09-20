<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function ShowRole()
    {
        $Roles = Role::all()->toQuery()->paginate(3);
        return view('forAdmin.Role.admin_role', compact('Roles'));
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
