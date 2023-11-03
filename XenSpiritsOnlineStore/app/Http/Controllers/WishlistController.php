<?php

namespace App\Http\Controllers;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function add_to_wishlist()
    {
        $product_id=$_POST['product_id'];
        $account_id=$_POST['account_id'];
        
        Wishlist::create(['product_id' => $product_id,
                          'account_id' => $account_id ] );
    }

    public function ShowWishlist()
    {
        return view('customer_wishlist');
    }
}
