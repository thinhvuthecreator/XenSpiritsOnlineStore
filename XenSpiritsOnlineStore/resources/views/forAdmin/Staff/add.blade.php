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
 <form method="POST" action="{{ route('foradmin.staff.addData') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
    <br>
    <label style="margin-bottom : -2px">Tên nhân viên</label>
    <input type="text" name="staff_name_input" accept="image/*" class="form-control" id="productcategory" aria-describedby="productCategory" placeholder="Enter staff name">
      @error('staff_name_input')
                    <span style="color : red;">{{$message}}</span><br>
      @enderror
    
    <!------------------------------------------ ảnh nhân viên ------------------------------------------->

    <label style="margin-bottom : -2px">Ảnh nhân viên</label>
    <input onchange="loadFile(event)" type="file" id="image_upload" name="staff_image_input" class="form-control" id="staff_image_input" aria-describedby="productCategory" placeholder="Add product image" value="Ảnh nhân viên">
    <p id="pSpace" style="display:none"></p>
    <div id="upload_image" style="display:none">
        <div class="display_upload">
          <image id="image_uploaded" style="width: 400px; height: 480px; border: 1px solid black">
        </div>
    </div>
    @error('staff_image_input')
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

   <!----------------------------------------------------------------------------------------------------->

    <label style="margin-bottom : -2px">Số điện thoại</label>
    <input type="text" name="phone_input" class="form-control" id="productcategory" aria-describedby="productCategory" placeholder="Enter product price">
     @error('phone_input')
                    <span style="color : red;">{{$message}}</span><br>
      @enderror
      <label style="margin-bottom : -2px">Căn cước công dân</label>
    <input type="text" name="citizen_id_input" class="form-control" id="productcategory" aria-describedby="productCategory" placeholder="Enter citizen id">
    @error('citizen_id_input')
                    <span style="color : red;">{{$message}}</span><br>
      @enderror
      <label style="margin-bottom : -2px">Ngày sinh</label>
    <input type="date" name="staff_birth_input" class="form-control" id="productcategory" aria-describedby="productCategory" placeholder="Enter date of birth">
      @error('staff_birth_input')
                    <span style="color : red;">{{$message}}</span><br>
      @enderror
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
