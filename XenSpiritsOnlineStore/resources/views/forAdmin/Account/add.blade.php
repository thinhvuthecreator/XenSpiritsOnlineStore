@extends('Layout.Admin')


@section('Title')
<title>Xen. Spirits® | Quản trị</title>
@endsection


@section('Content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('./Partial/content_header', ['url1' => 'Add Account' , 'url2' => 'Account', 'url3' => 'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
 <form method="POST" action="{{ route('foradmin.account.addData') }}">
    @csrf
    <div class="form-group">
    <label for="account">Email</label>
    <input type="text" name="email_input" class="form-control" id="account" aria-describedby="account" placeholder="Enter email">
    </div>
    <div class="form-group">
    <label for="account">Password</label>
    <input type="password" name="password_input" class="form-control" id="account" aria-describedby="account" placeholder="Enter password, At least 8 characters">
    </div>
    <div class="form-group">
    <label for="account">Account Owner</label>
    <select name="staff_input" class="form-control" id="account" aria-describedby="account">
    @foreach($staffs as $staff)
    <option> {{ $staff->full_name }}</option>
    @endforeach
    </select>
    </div>
    <div class="form-group">
    <label for="account">Account Role</label>
    <select name="role_input" class="form-control" id="account" aria-describedby="account">
    @foreach($roles as $role)
    <option> {{ $role->name }}</option>
    @endforeach
    </select>
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
