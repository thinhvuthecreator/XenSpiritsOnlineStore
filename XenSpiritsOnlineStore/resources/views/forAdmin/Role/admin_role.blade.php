@extends('Layout.Admin')


@section('Title')
<title>Xen. Spirits® | Quản trị</title>
@endsection


@section('Content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('./Partial/content_header', ['url1' => 'Role List' ,'url2' => 'Role', 'url3' => 'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
      <div class="col-md-12">
        <a href="{{ route('foradmin.role.add') }}" class="btn btn-success float-right m-2">Add</a>
      </div>
     <div class="col-md-12">
        <table class="table">
     <thead>
    <tr>
      <th scope="col">Mã quyền</th>
      <th scope="col">Tên quyền</th>
      <th scope="col">Mô tả quyền</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
    </tr>
    <tr>
      <th scope="column"></th>
      <button class="btn btn-success">Edit</button>
      <button class="btn btn-danger">Delete</button>
    </tr>
  </tbody>
        </table>
          </div>

 
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection

