@extends('Layout.Admin')


@section('Title')
<title>Xen. Spirits® | Quản trị</title>
@endsection


@section('Content')

<style></style>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

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
    <input onchange="loadFile(event)" type="file" id="image_upload" name="product_image_input" class="form-control" id="product_image_input" aria-describedby="productCategory" placeholder="Add product image" value="Ảnh chính của sản phẩm">
    <p id="pSpace" style="display:none"></p>
    <div id="upload_image" style="display:none">
        <div class="display_upload">
          <image id="image_uploaded" style="width: 400px; height: 480px; border: 1px solid black">
        </div>
    </div>
    @error('product_image_input')
                    <span style="color : red;">{{$message}}</span><br>
    @enderror

    <script>
      $(document).ready(function(){
          $('#image_upload').on('change',function(){
            var reader = new FileReader();
            reader.onload = function(event){
              var image_uploaded = document.getElementById('image_uploaded');
              image_uploaded.src = reader.result;

              image_uploaded.onload = function() {
              URL.revokeObjectURL(image_uploaded.src) // free memory
              }
            };
            reader.readAsDataURL(event.target.files[0]);

            $('#upload_image').show();
            $('#pSpace').show();
          });
      });
    </script>

     <!-- ------------------Đây là phần chi tiết sản phẩm---------------------->

    <label style="margin-bottom : -2px">Ảnh chi tiết sản phẩm</label>
    <input type="file" id="detail_image_upload" name="product_detail_image_input[]" class="form-control" aria-describedby="productCategory" placeholder="Add product image" value="Ảnh chi tiết của sản phẩm" multiple>
    <div>
    <div id ="gallery" ></div>
    </div>
    <script>
      $(function(){
        
        // var input = document.getElementById('#detail_image_upload');
        // var placeToInsertImagePreview = document.getElementById('#gallery');

        var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
        var filesAmount = input.files.length;

        for (i = 0; i < filesAmount; i++) {
        var reader = new FileReader();

        reader.onload = function(event) {
            $($.parseHTML('<img style="display:flex; border: 1px solid black; width:400px;height:480px; margin-top:5px;margin-bottom:5px;margin-right:8px;">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
        }

        reader.readAsDataURL(input.files[i]);
        }
        
        }
        }
        
       

        $('#detail_image_upload').on('change', function() {
               imagesPreview(this, $('#gallery'));
             });
        
    
       });



    </script>

     <!------------------------------------------------------------------------>

    <label style="margin-bottom : -2px">Giá sản phẩm</label>
    <input type="text" name="product_price_input" class="form-control" id="productcategory" aria-describedby="productCategory" placeholder="Enter product price">
    @error('product_price_input')
                    <span style="color : red;">{{$message}}</span><br>
      @enderror
    <label style="margin-bottom : -2px">Số lượng sản phẩm</label>
    @foreach($sizes as $size)
    <input type="text" name="product_quantity_input" class="form-control" id="productcategory" aria-describedby="productCategory" placeholder="Enter quantiy for {{ $size->name}} size">
    @error('product_quantity_input')
                    <span style="color : red;">{{$message}}</span><br>
    @enderror
    @endforeach

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
