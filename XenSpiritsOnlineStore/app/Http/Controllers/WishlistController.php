<?php

namespace App\Http\Controllers;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $client_id = $_SESSION["client_id"];
        $account_id = DB::table('accounts')->where('client_id',$client_id)->value('id');
        $wishlists = DB::table('wishlists')->where('account_id',$account_id)->get();
        return view('forClient.customer_wishlist',compact('wishlists'));
    }
}
