<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
