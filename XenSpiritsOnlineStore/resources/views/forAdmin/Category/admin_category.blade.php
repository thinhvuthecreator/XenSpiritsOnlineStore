@extends('Layout.Admin')


@section('Title')
<title>Xen. Spirits® | Quản trị</title>
@endsection


@section('Content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('./Partial/content_header', ['url1' => 'Category List' ,'url2' => 'Category', 'url3' => 'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
      <div class="col-md-12">
        <a href="{{ route('foradmin.category.add') }}" class="btn btn-success float-right m-2">Add</a>
      </div>
     <div class="col-md-12">
        <table class="table">
     <thead>
    <tr>
      <th scope="col">Mã loại sản phẩm</th>
      <th scope="col">Tên loại sản phẩm</th>
    </tr>
  </thead>
  <tbody>
    @foreach($Categories as $category)
    <tr>
      <th>{{ $category->id }}</th>
      <td>{{ $category->name }}</td>
      <td> 
        <a href="{{ route('category.edit',['id' => $category->id]) }}" class="btn btn-success">Edit</a>
        <a href="{{ route('category.delete',['id' => $category->id]) }}" class="btn btn-danger">Delete</a>
      </td>
      </tr>
    @endforeach
  </tbody>
        </table>
          </div>
        <div class="col-md-12">
          {{ $Categories->links() }}
        </div>
 
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection

