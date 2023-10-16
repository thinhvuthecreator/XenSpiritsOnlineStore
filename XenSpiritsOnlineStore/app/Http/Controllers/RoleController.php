<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function EditRole($id)
    {
        $role_name = DB::table('roles')->where('id',$id)->value('name');
        $role_discription = DB::table('roles')->where('id',$id)->value('discription');
        return view('forAdmin.Role.edit',compact('role_name','role_discription'));
    }
    public function EditRoleData(Request $request)
    {
        $current_name = $request->Current_Role_input;
        DB::table('roles')->where('name', $current_name)->update(['name' => $request->Role_input,'Discription' => $request->Discription_input]);
        return redirect(route('foradmin.role'));
    }
}
