<?php

namespace App\Http\Controllers;

use App\Models\detailProductImage;
use App\Models\product;
use App\Models\quantity_detail;
use App\Models\size;
use App\Models\productCategory;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function ShowProduct()
    {
        $sizes = size::all();
        $products = product::all();
         return view('forAdmin.Product.admin_product',compact('products','sizes'));
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
        $product_detail_images = DB::table('detail_product_images')->where('product_id', $id)->pluck('name'); // lay ra anh chi tiet san pham;
        
        return view('product_detail',compact(['product_selected','product_category_name','product_detail_images']));

    }

    public function AddProduct()
    {
        $sizes = size::all();
        $productCategories = productCategory::all();
        return view('forAdmin.Product.add', compact('productCategories','sizes'));
    }

    public function EditProduct($id)
    {
       $productCategories = productCategory::all();
       $product = DB::table('products')->where('id',$id)->first();
       $detail_images = DB::table('detail_product_images')->where('product_id',$id)->pluck('name');
       return view('forAdmin.Product.edit',compact('productCategories','product','detail_images'));
    }

    public function EditProductData(Request $request,$id)
    {
        $product_category_id = DB::table('product_categories')->where('name', $request->product_category_input)->value('id');
        //validate san pham ( giong voi luc them san pham)
        $rules = [
            'product_name_input' => 'required',

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
  
        $category_id =  DB::table('product_categories')->where('name',$request->product_category_input)->value('id');
        $img = '';
        if($request->product_image_input == null)
        {
          $img = DB::table('products')->where('id',$id)->value('mainImage');
          
        }
        else
        {
          $img = $request->product_image_input->getClientOriginalName();
        }
        DB::table('products')->where('id', $id)->update(
           ['name' => $request->product_name_input, 
            'productCategory_id' => $category_id, 
            'mainImage' => $img,
            'price' => $request->product_price_input,
            'quantity' => $request->product_quantity_input,
            'productDescription' => $request->product_description_input]);


        if($image = $request->file('product_image_input'))
        {
        $storedPath = $image->move('Resource/product_Images', $img);
        }
        if($request->file('product_detail_image_input'))    
        {
        $this->update_detail_image($request,$id);
        }
        return redirect(route('foradmin.product'));
       

    }
    public function AddProductData(Request $request)
    {
        // lay ra id cua loai san pham
        $product_category_id = DB::table('product_categories')->where('name', $request->product_category_input)->value('id');
        
        $rules = [
            'product_name_input' => 'required',
            'product_image_input' => 'required|image',

            'product_price_input' => 'required|numeric|min:0',
           
            'product_description_input' => 'nullable'
        ];
        $messages = [
            'required' => 'Trường này không được để trống',
            'image' => 'Đây không phải là file ảnh ! Vui lòng chọn file ảnh',
            'numeric' => 'Vui lòng nhập số',
            'product_price_input.min' => 'Giá sản phẩm không thể âm',
           

        ];
        $request->validate($rules,$messages);
        
        $image_original_name = $request->file('product_image_input')->getClientOriginalName();

        product::create([
            'name' => $request->product_name_input,
            'productCategory_id' =>  $product_category_id,
            'mainImage' => $image_original_name,
            'productDescription' => $request->product_description_input,
            'price' => $request->product_price_input
        ]);

        $image = $request->file('product_image_input');
        $storedPath = $image->move('Resource/product_Images', $image->getClientOriginalName());
        
         //tạo phần ảnh chi tiết sản phẩm sau khi tạo sản phẩm
        $this->add_detail_image($request);

        //tạo chi tiết số lượng sau khi tạo sản phẩm
        $i = 1;
        $mang[] ='';
        foreach ($_POST['product_quantity_input'] as $quantity ) {
            // $lastest_product = DB::table('products')->latest('created_at')->first();
            // quantity_detail::create([
            //     'product_id' => $lastest_product->id,
            //     'quantity' => $quantity,
            //     'size_id' => $size_id,
            // ]);
            $mang[] = $i*2;
             dd($mang);
        }
        

        return redirect(route('foradmin.product.add'));
    }

    //ham them anh chi tiet san pham
    public function add_detail_image($request)
    {

        //lay ra product id de them vao anh chi tiet
        $lastest_product = DB::table('products')->latest('created_at')->first();
        $product_ID = $lastest_product->id;
        
        $images = array();
        if($files=$request->file('product_detail_image_input')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('Resource/product_Images/detail_Images',$name);
                $images[] = $name;

                detailProductImage::create([
                    'name'=> $name,
                    'product_id' => $product_ID
                ]);
             }
        }  
    }

    public function update_detail_image($request,$id)
    {

        //lay ra product id de them vao anh chi tiet
        $current_product = DB::table('products')->where('id',$id)->first();
        //$id duoc truyen vao la id cua product hien tai

        $images = array();
        if($files=$request->file('product_detail_image_input')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('Resource/product_Images/detail_Images',$name);
                $images[] = $name;

                detailProductImage::create([
                    'name'=> $name,
                    'product_id' => $id
                ]);
             }
        }  
    }

            

      
        


}
