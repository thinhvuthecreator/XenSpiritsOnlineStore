<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\checkout_session;
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

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $cart_ids = explode(",", $ids);
        $carts = array();
        $address = $_SESSION["client_address"];
        $phone = $_SESSION["phone"];
        foreach($cart_ids as $cart_id)
        {
            $carts[] = DB::table('carts')->where('id',$cart_id)->get()->first();

        }
        return view('forClient.customer_checkout', compact('carts','address','phone'));

    }

    public function CheckOut($ids)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $cart_ids = explode(",", $ids);
        $carts = array();
        $address = $_SESSION["client_address"];
        $phone = $_SESSION["phone"];

        foreach($cart_ids as $cart_id)
        {
            checkout_session::create([
                'cart_id' => $cart_id,
                'payment_type' => 'cod'
            ]);
            $carts[] = DB::table('carts')->where('id',$cart_id)->get()->first(); // lấy ra các cart item đã checkout
        }
        return view('forClient.checkout-confirm-type.customer_checkout_success', compact('address','phone'));
    }


}
