<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\size;
class SizeController extends Controller
{
    public function ShowSize(){
        $sizes = size::all();
        return view("forAdmin.Size.admin_size",compact("sizes"));
    }
    public function AddSize(){
        return view("forAdmin.Size.add");
    }
    public function AddSizeData(Request $request){
        $rules = [
            'size_input' => 'required',
        ];
        $messages = [
            'required' => 'Trường này không được để trống'
        ];
        $request->validate($rules,$messages);
      size::create([
        'name' =>  $request->size_input
      ]);

      return back()->with('success','Thêm thành công');
    }
    public function EditSize($id){
        
    }
    public function EditSizeData(Request $request){

    }
}
