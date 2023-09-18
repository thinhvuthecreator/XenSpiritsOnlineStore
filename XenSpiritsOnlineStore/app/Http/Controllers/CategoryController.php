<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\productCategory;


class CategoryController extends Controller
{
    public function ShowCategory()
    {
         return view('forAdmin.Category.admin_category');
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
        redirect(route('foradmin.category.add'));
    }
}
