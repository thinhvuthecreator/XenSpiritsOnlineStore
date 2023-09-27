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
    <label for="productCategory">Product</label>
    <input type="text" name="product_name_input" class="form-control" id="productcategory" aria-describedby="productCategory" placeholder="Enter product category"> 
    <select name="product_category_input" class="form-control" id="productcategory" aria-describedby="productCategory">
      @foreach($productCategories as $productCategory)
      <option>{{$productCategory->name}}</option>
      @endforeach
    </select>
    <input type="file" name="product_image_input" class="form-control" id="product_image_input" aria-describedby="productCategory" placeholder="Add product image">
    <input type="text" name="product_price_input" class="form-control" id="productcategory" aria-describedby="productCategory" placeholder="Enter product price">
    <input type="text" name="product_quantity_input" class="form-control" id="productcategory" aria-describedby="productCategory" placeholder="Enter product quantity">
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
