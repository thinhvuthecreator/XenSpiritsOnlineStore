<?php

namespace App\Http\Controllers;

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
        return redirect(route('foradmin.category.add'));
    }

    public function Delete()
    {
       return "fdsfsdf";
    }

    public function Edit()
    {
      
    }


}
