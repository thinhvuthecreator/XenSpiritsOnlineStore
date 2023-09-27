<?php

namespace App\Http\Controllers;

use App\Models\productCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ShowProduct()
    {
        return view('forAdmin.Product.admin_product');
    }
    public function AddProduct()
    {
        $productCategories = productCategory::all();
        $image_src = null;
        return view('forAdmin.Product.add', compact('productCategories','image_src'));
    }
    public function AddProductData()
    {
        return 'them du lieu';
    }

}
