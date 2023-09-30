<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\productCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function ShowProduct()
    {
        $products = product::all();
         return view('forAdmin.Product.admin_product',compact('products'));
    }

    public function ShowProductClient()
    {
        $products = product::all();
        return view('product',compact('products'));

    }

    public function ShowProductDetail($id)
    {
        $product_selected = DB::table('products')->where('id', $id)->first(); // lay ra san pham duoc chon
        $product_selected_Category_id =  DB::table('products')->where('id', $id)->value('productCategory_id'); // lay ra ma loai sp dc chon
        $product_category_name = DB::table('product_categories')->where('id', $product_selected_Category_id)->value('name'); // lay ra ten cua ma loai san pham dc chon
        return view('product_detail',compact(['product_selected','product_category_name']));
   
    }

    public function AddProduct()
    {
        $productCategories = productCategory::all();
        return view('forAdmin.Product.add', compact('productCategories'));
    }
    public function AddProductData(Request $request)
    {
        // lay ra id cua loai san pham
        $product_category_id = DB::table('product_categories')->where('name', $request->product_category_input)->value('id');
        //$tenmoi = UsefulTool::xulychuoi( $request->product_name_input);
        
        $rules = [
            'product_name_input' => 'required',
            'product_image_input' => 'required|image',
            'product_price_input' => 'required|numeric|min:0',
            'product_quantity_input' => 'required|numeric|min:1',
            'product_description_input' => 'nullable'
        ];
        $messages = [
            'required' => 'Trường này không được để trống',
            'image' => 'Đây không phải là file ảnh ! Vui lòng chọn file ảnh',
            'numeric' => 'Vui lòng nhập số',
            'product_price_input.min' => 'Giá sản phẩm không thể âm',
            'product_quantity_input.min' => 'Số lượng sản phẩm tối thiểu là 1'

        ];
        $request->validate($rules,$messages);
        
        $image_original_name = $request->file('product_image_input')->getClientOriginalName();

        product::create([
            'name' => $request->product_name_input,
            'productCategory_id' =>  $product_category_id,
            'mainImage' => $image_original_name,
            'quantity' => $request->product_quantity_input,
            'productDescription' => $request->product_description_input,
            'price' => $request->product_price_input
        ]);

        $image = $request->file('product_image_input');
        $storedPath = $image->move('Resource/product_Images', $image->getClientOriginalName());
        
        return redirect(route('foradmin.product.add'));
        // return $request->file('product_image_input')->getClientOriginalName();
    }
        


}
