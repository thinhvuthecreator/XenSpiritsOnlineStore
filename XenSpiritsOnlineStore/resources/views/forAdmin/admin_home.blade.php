@extends('Layout.Admin')


@section('Title')
<title>Xen. Spirits® | Quản trị</title>
@endsection


@section('Content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('./Partial/content_header', ['url1' => 'Admin Main view' , 'url2' => 'Admin', 'url3' => 'Mainview'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        THIS IS ADMIN CONTENT
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection

