@extends('Layout.Admin')


@section('Title')
<title>Xen. Spirits® | Quản trị</title>
@endsection


@section('Content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('./Partial/content_header', ['url1' => 'Add Staff' , 'url2' => 'Staff', 'url3' => 'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
 <form method="POST" action="{{ route('foradmin.staff.addData') }}">
    @csrf
    <div class="form-group">
    <label for="staff">Staff</label>
    <input type="text" name="staffCategory_input" class="form-control" id="staff" aria-describedby="staff" placeholder="Enter product category">
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
