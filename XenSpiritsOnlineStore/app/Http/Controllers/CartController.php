<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function ShowCart()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
       }
       $shopping_session = $_SESSION["shopping_session"];

       $carts = $shopping_session != null ? DB::table('carts')->where('shopping_session_id', $shopping_session->id)->get() : null;

       return view('forClient.customer_cart',compact('carts'));
    }

    public function DeleteCartItem($id){
     Cart::destroy($id);
     $data = array("success" => true, "message" => "Đã xóa khỏi giỏ hàng");
     header("Content-Type: application/json");
     return json_encode($data);
    }
    public function ShowCheckOut($ids){
        $cart_ids = explode(",", $ids);
        $carts[] = "";
        foreach($cart_ids as $cart_id)
        {
            $carts[] = DB::table('carts')->where('id',$cart_id)->get();
        }
        // return view('forClient.customer_checkout', compact('carts'));
        $data = array("success" => true, "message" => $ids);
        return json_encode($data);
    }

    public function CheckOut($ids)
    {

    }


}
