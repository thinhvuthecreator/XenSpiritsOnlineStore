@extends('Layout.Admin')


@section('Title')
<title>Xen. Spirits® | Quản trị</title>
@endsection


@section('Content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('./Partial/content_header', ['url1' => 'Add Role' , 'url2' => 'Role', 'url3' => 'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
 <form method="POST" action="{{ route('foradmin.role.addData') }}">
    @csrf
    <div class="form-group">
    <label for="role">Role</label>
    <input type="text" name="Role_input" class="form-control" id="role" aria-describedby="role" placeholder="Enter role">
    @error('Role_input')
         <span style="color : red;">{{$message}}</span><br>
    @enderror
  </div>
    <div class="form-group">
    <label for="role">Discription</label>
    <input type="text" name="Discription_input" class="form-control" id="role" aria-describedby="role" placeholder="Enter Discription">
    @error('Discription_input')
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
