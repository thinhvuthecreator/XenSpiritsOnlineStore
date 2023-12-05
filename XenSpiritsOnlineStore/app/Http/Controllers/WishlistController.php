<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Shopping_session;
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

    public function DeleteWishItem($id){
       Wishlist::destroy($id);
    $data = array("success" => true, "message" => "Xóa khỏi yêu thích thành công");
    header("Content-Type: application/json");
    return json_encode($data);

    }

    public function AddToCart($item_id)
    {
       if (session_status() == PHP_SESSION_NONE) {
            session_start();
       }

       // lấy ra shopping session hiện tại ( mới nhất ) của account đang đăng nhập
       $shopping_session = DB::table('shopping_sessions')->where('account_id',$_SESSION["account_id"])->latest('created_at')->first();

       if($shopping_session == null || $shopping_session->purchase_status != "pending") // cần thêm mới shopping session
       {
            Shopping_session::create([
            'account_id' => $_SESSION["account_id"],
            'purchase_status' => 'pending',
            'payment_type' => 'cod'
            ]);
            // shopping session vừa thêm mới
            $current_shopping_session = DB::table('shopping_sessions')->where('account_id',$_SESSION["account_id"])->latest('created_at')->first();
             // tạo giỏ hàng, thêm sản phẩm vào giỏ hàng
            Cart::create([
              'product_id' => $item_id,
              'quantity' => 1,
              'shopping_session_id' => $current_shopping_session->id
            ]);

       }
        else if ($shopping_session != null && $shopping_session->purchase_status == "pending") // shopping session trước đó vẫn bằng pending, dùng luôn shopping session hiện tại ko cần thêm mới
        {
           // chỉnh sửa lại cart nằm trong shopping session hiện tại
           if(!$this->check_item_duplicated($shopping_session, $item_id)) // nếu sản phẩm này ko có trong cart này
           {
             //tạo giỏ hàng, thêm sản phẩm vào giỏ hàng
             Cart::create([
              'product_id' => $item_id,
              'quantity' => 1,
              'shopping_session_id' => $shopping_session->id
             ]);
           }
           else
           {

            $quantity = DB::table('carts')->where([['shopping_session_id','=', $shopping_session->id],
            ['product_id','=', $item_id] ])->value('quantity');

            DB::table('carts')->where([ ['shopping_session_id', '=',$shopping_session->id],
                                       ['product_id','=', $item_id] ])->update([
                'quantity' => $quantity + 1
             ]);
           }
        }

    $data = array("success" => true, "message" => "Đã thêm vào giỏ hàng");
    header("Content-Type: application/json");
    return json_encode($data);
        
    }
           
    public function check_item_duplicated($shopping_session, $item_id)
    {
       
        // lấy ra các item của cart thuộc shopping session hiện tại
        $current_cart = DB::table("carts")->where('shopping_session_id', $shopping_session->id)->get();

        foreach($current_cart as $cart)
        {
            if($item_id == $cart->product_id)
            {
                return true;
            }
        }
        return false;
    }
    //
    

       
}
