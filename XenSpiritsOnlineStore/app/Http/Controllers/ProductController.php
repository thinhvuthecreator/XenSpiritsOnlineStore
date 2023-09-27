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
        return view('forAdmin.Product.admin_product');
    }
    public function AddProduct()
    {
        $productCategories = productCategory::all();
        $image_src = null;
        return view('forAdmin.Product.add', compact('productCategories','image_src'));
    }
    public function AddProductData(Request $request)
    {
        //$tenmoi = UsefulTool::xulychuoi( $request->product_name_input);

        $product_category_id = DB::table('product_categories')->where('name', $request->product_category_input)->value('id');

        product::create([
            'name' => $request->product_name_input,
            'productCategory_id' =>  $product_category_id,
            'mainImage' => $request->product_image_input,
            'quantity' => $request->product_quantity_input,
            'productDescription' => $request->product_description_input,
            'price' => $request->product_price_input
        ]);

        $image = $request->file('product_image_input');
        $storedPath = $image->move('Resource', $image->getClientOriginalName());
        
        return redirect(route('foradmin.product.add'));
        // return $request->file('product_image_input')->getClientOriginalName();
    }
        


}
