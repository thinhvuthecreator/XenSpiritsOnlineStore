<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use \App\Models\productCategory;


class CategoryController extends Controller
{
    public function ShowCategory()
    {
         $Categories = productCategory::all()->toQuery()->paginate(5);
         return view('forAdmin.Category.admin_category', compact('Categories'));
    }

    public function AddCategory()
    {
         
         return view('forAdmin.Category.add');
    }

    public function AddCategoryData(Request $request)
    {
        //return $request->productCategory_input;
        productCategory::create([
          'name'=> $request->productCategory_input
        ]);
        return redirect()->back()->withSuccess('Thêm thành công');
    }

    public static function Delete($id)
    {
       if(productCategory::destroy($id))
       {
          return redirect(route('foradmin.category'));
       }
    }

    public static function Edit($id)
    {
      $name = DB::table('product_categories')->where('id',$id)->pluck('name');
      return view('forAdmin.Category.edit',compact(['id','name']));
    }

    public function xulychuoi($oldstring)
    {
       $trimmed = ltrim($oldstring,'["');
       $trimmed = rtrim($trimmed,'"]');
       return $trimmed; 
    }
    
    public function EditCategoryData(Request $request)
    {
        //return $request->productCategory_input;
        DB::table('product_categories')->where('name', $request->productCategory_input_readonly)->update(['name' => $request->productCategory_input]);

        return redirect()->back()->withSuccess('Cập nhật thành công');
    } 

    

  




}
