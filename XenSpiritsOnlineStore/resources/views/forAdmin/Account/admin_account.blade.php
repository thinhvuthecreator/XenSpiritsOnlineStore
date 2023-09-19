@extends('Layout.Admin')


@section('Title')
<title>Xen. Spirits® | Quản trị</title>
@endsection


@section('Content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('./Partial/content_header', ['url1' => 'Account List' ,'url2' => 'Account', 'url3' => 'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
      <div class="col-md-12">
        <a href="{{ route('foradmin.account.add') }}" class="btn btn-success float-right m-2">Add</a>
      </div>
     <div class="col-md-12">
     <table class="table">
         
         <thead>
             <tr>
                 <th>Mã tài khoản</th>
                 <th>Email</th>
                 <th>Vai trò</th>
                 <th>Thời gian tạo</th>
             </tr>
          </thead>
             
          <tbody>
             <!-- <tr>
                 <th>1</th>
                 <td>Mark</td>
                 <td>Otto</td>
             </tr>
             <tr>
                 <th>2</th>
                 <td>Jacob</td>
                 <td>Thornton</td>
              </tr> -->

              @foreach($Accounts as $account)
              
                <tr>
                 <th>{{ $account->id }}</th>
                 <td>{{ $account->email }}</td>
                 <td>{{ $account->id }}</td>
                 <td>{{ $account->created_at }}</td>
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

