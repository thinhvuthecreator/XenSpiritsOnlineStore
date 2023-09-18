@extends('Layout.Admin')


@section('Title')
<title>Xen. Spirits® | Quản trị</title>
@endsection


@section('Content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('./Partial/content_header', ['url1' => 'Add Category' , 'url2' => 'Category', 'url3' => 'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
 <form method="POST" action="{{ route('foradmin.category.addData') }}">
    @csrf
    <div class="form-group">
    <label for="productCategory">Product Category</label>
    <input type="text" name="productCategory_input" class="form-control" id="productcategory" aria-describedby="productCategory" placeholder="Enter product category">
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
