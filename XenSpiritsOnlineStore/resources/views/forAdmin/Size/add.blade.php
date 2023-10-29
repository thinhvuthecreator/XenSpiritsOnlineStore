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
 <form method="POST" action="{{ route('foradmin.size.addData') }}">
    @csrf
    <div class="form-group">
    <label for="productCategory">Size</label>
    <input type="text" name="size_input" class="form-control" id="productcategory" aria-describedby="productCategory" placeholder="Enter size">
     @error('size_input')
                    <span style="color : red;">{{$message}}</span><br>
     @enderror  
  </div>
  <button type="submit" class="btn btn-primary">Add</button>
  @if(session('success'))
    <p class="alert alert-success">
      {{session('success')}}
    </p>
  @endif
 </form>
        </div>
      </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
