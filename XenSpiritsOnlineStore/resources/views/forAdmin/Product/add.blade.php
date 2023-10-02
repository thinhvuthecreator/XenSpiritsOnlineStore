@extends('Layout.Admin')


@section('Title')
<title>Xen. Spirits® | Quản trị</title>
@endsection


@section('Content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('./Partial/content_header', ['url1' => 'Add Product' , 'url2' => 'Product', 'url3' => 'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
 <form method="POST" action="{{ route('foradmin.product.addData') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
    <br>
    <label style="margin-bottom : -2px">Tên sản phẩm</label>
    <input type="text" name="product_name_input" class="form-control" id="productcategory" aria-describedby="productCategory" placeholder="Enter product category"> 
      @error('product_name_input')
                    <span style="color : red;">{{$message}}</span><br>
      @enderror
      <label style="margin-bottom : -2px">Loại sản phẩm</label>
    <select name="product_category_input" class="form-control" id="productcategory" aria-describedby="productCategory">
      @foreach($productCategories as $productCategory)
      <option>{{$productCategory->name}}</option>
      @endforeach
    </select>
    <label style="margin-bottom : -2px">Ảnh dại diện sản phẩm</label>
    <input type="file" name="product_image_input" class="form-control" id="product_image_input" aria-describedby="productCategory" placeholder="Add product image" value="Ảnh chính của sản phẩm">
     @error('product_image_input')
                    <span style="color : red;">{{$message}}</span><br>
      @enderror
    
     <!-- ------------------Đây là phần chi tiết sản phẩm---------------------->
      
    <label style="margin-bottom : -2px">Ảnh chi tiết sản phẩm</label>
    <input type="file" name="product_detail_image_input[]" class="form-control" id="product__detail_image_input" aria-describedby="productCategory" placeholder="Add product image" value="Ảnh chi tiết của sản phẩm" multiple>
     @error('product_detail_image_input[]')
                    <span style="color : red;">{{$message}}</span><br>
      @enderror

     <!------------------------------------------------------------------------>

      <label style="margin-bottom : -2px">Giá sản phẩm</label>
    <input type="text" name="product_price_input" class="form-control" id="productcategory" aria-describedby="productCategory" placeholder="Enter product price">
    @error('product_price_input')
                    <span style="color : red;">{{$message}}</span><br>
      @enderror
      <label style="margin-bottom : -2px">Số lượng sản phẩm</label>
    <input type="text" name="product_quantity_input" class="form-control" id="productcategory" aria-describedby="productCategory" placeholder="Enter product quantity">
    @error('product_quantity_input')
                    <span style="color : red;">{{$message}}</span><br>
      @enderror
      <label style="margin-bottom : -2px">Miêu tả sản phẩm</label>
    <input type="text" name="product_description_input" class="form-control" id="productcategory" aria-describedby="productCategory" placeholder="Add product description">

  </div>
  <button type="submit" class="btn btn-primary">Add</button>
 </form>
        </div>

      </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
