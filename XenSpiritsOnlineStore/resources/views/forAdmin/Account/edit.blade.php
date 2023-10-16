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
 <form method="POST" action="{{ route('foradmin.account.editData') }}">
    @csrf
    <div class="form-group">
    <label for="account">Current email</label>
    <input readonly type="text" name="current_email_input" class="form-control" id="account" aria-describedby="account" value =" {{ $current_email }} ">
    </div>
    <div class="form-group">
    <label for="account">Account Owner</label>
    <input readonly name="current_staff_input" class="form-control" id="account" aria-describedby="account" value=" {{ $account_owner_name }}">
    </div>
    <div class="form-group">
    <label for="account">Current account Role</label>
    <input readonly name="current_role_input" class="form-control" id="account" aria-describedby="account" value=" {{ $current_role_name }}">

    <div class="form-group">
    <label for="account">New account Role</label>
    <select name="role_input" class="form-control" id="account" aria-describedby="account">
    @foreach($roles as $role)
    <option> {{ $role->name }}</option>
    @endforeach
    </select>
    </div>

  <button type="submit" class="btn btn-primary">Edit</button>
 </form>
        </div>
      </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
