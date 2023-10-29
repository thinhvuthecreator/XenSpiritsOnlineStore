<?php

namespace App\Http\Controllers;

use App\Models\quantity_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\size;
use App\Models\product;
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

      // cứ mỗi khi có size mới được tạo thì sản phẩm mới sẽ bao gồm size đó
      $lastest_size = DB::table('sizes')->latest('created_at')->first();
      $all_products = product::all();
      foreach ($all_products as $product){
      quantity_detail::create([
        'product_id'=> $product->id,
        'size_id' => $lastest_size->id,
        'quantity' => 0
      ]);
      }


      return back()->with('success','Thêm thành công');
    }
    public function EditSize($id){
        
    }
    public function EditSizeData(Request $request){

    }
}
