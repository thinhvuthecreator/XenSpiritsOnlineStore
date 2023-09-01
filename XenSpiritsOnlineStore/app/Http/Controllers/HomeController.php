<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function ShowHome()
    {
        return view('home');
    }

    public function ShowSizeGuide()
    {
        return view('sizeGuide');
    }

    public function ShowProduct()
    {
        return view('product');
    }

    public function ShowWishlist()
    {
        return view('wishlist');
    }
}
