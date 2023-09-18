<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ShowProduct()
    {
        return view('forAdmin.Product.admin_product');
    }
    public function AddProduct()
    {
        return view('forAdmin.Product.add');
    }
    public function AddProductData()
    {
        return 'them du lieu';
    }

}
