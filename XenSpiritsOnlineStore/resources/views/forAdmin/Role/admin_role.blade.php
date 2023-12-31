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
                 <th>Mã quyền</th>
                 <th>Tên quyền</th>
                 <th>Mô tả quyền</th>
             </tr>
          </thead>
             
          <tbody>
              @foreach($Roles as $role)
              
                <tr>
                 <th>{{ $role->id }}</th>
                 <td>{{ $role->name }}</td>
                 <td>{{ $role->discription }}</td>
                 <td> 
                  <a href="{{ route('foradmin.role.edit',['id' => $role->id]) }}"><button class="btn btn-success">Edit</button></a>
                  <a><button class="btn btn-danger">Delete</button></a>
                 </td>
    
                </tr>
             @endforeach

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

