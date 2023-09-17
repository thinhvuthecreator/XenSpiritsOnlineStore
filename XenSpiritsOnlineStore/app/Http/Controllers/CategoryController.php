<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function ShowCategory()
    {
         return view('/forAdmin/admin_category');
    }

    public function AddCategory()
    {
         return 'Add Category';
    }
}
