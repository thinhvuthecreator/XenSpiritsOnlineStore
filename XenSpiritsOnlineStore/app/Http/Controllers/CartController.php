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
       $carts = DB::table('carts')->where('shopping_session_id', $shopping_session->id)->get();
       return view('forClient.customer_cart',compact('carts'));
    }

    public function DeleteCartItem($id){
     Cart::destroy($id);
     $data = array("success" => true, "message" => "Đã xóa khỏi giỏ hàng");
     header("Content-Type: application/json");
     return json_encode($data);
    }
    public function CheckOut($id){
    }


}
