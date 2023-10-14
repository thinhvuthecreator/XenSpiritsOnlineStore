<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function ShowRole()
    {
        $Roles = Role::all();
        return view('forAdmin.Role.admin_role', compact('Roles'));
    }
    public function AddRole()
    {
        return view('forAdmin.Role.add');
    }
    public function AddRoleData(Request $request)
    {
        $rules = [
            'Role_input' => 'required',
            'Discription_input' => 'required'
        ];
        $messages = [
            'required' => 'Trường này không được để trống'
        ];
        $request->validate($rules,$messages);

        Role::create([
            'name' => $request->Role_input,
            'discription' => $request->Discription_input
        ]);
            
        return redirect()->back();

    }
}
