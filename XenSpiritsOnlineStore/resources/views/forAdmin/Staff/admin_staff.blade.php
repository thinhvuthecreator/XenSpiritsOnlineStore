@extends('Layout.Admin')


@section('Title')
<title>Xen. Spirits® | Quản trị</title>
@endsection


@section('Content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('./Partial/content_header', ['url1' => 'Staff List' ,'url2' => 'Staff', 'url3' => 'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
      <div class="col-md-12">
        <a href="{{ route('foradmin.staff.add') }}" class="btn btn-success float-right m-2">Add</a>
      </div>
     <div class="col-md-12">
        <table class="table">
     <thead>
    <tr>
      <th scope="col">Mã nhân viên</th>
      <th scope="col">Tên</th>
      <th scope="col">Vai trò</th>
      <th scope="col">Số điện thoại</th>
      <th scope="col">Ngày sinh</th>
      <th scope="col">Căn cước công dân</th>
      <th scope="col">Ngày thêm</th>
    </tr>
  </thead>
  <tbody>
    @foreach($staffs as $staff)
    @php
     $role_id = DB::table('accounts')->where('staff_id',$staff->id)->value('role_id');
     $role_name = DB::table('roles')->where('id',$role_id)->value('name');
    @endphp
    <tr>
      <td>{{ $staff->id }}</td>
      <td>{{ $staff->full_name }}</td>
      <td>{{ $role_name }}</td>
      <td>{{ $staff->phone }}</td>
      <td>{{ $staff->date_of_birth}}</td>
      <td>{{ $staff->citizen_id }}</td>
      <td>{{ $staff->created_at }}</td>
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

