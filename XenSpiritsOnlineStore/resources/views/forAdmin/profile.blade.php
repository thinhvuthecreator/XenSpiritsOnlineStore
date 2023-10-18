@extends('Layout.Admin')


@section('Title')
<title>Xen. Spirits® | Quản trị</title>
@endsection


@section('Content')

<style></style>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('./Partial/content_header', ['url1' => 'Profile' , 'url2' => 'Admin', 'url3' => 'Profile'])
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-6" style="background-color : pink">
                 <div class="row">
                  <div class="col-md-6">
                    <img style="width: 300px; height: 350px; display:inline;" src="https://scontent.fhan4-3.fna.fbcdn.net/v/t39.30808-6/391698355_801947288396747_9208904244830062786_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=5f2048&_nc_ohc=l4b5Qnn45iMAX_H53pR&_nc_ht=scontent.fhan4-3.fna&oh=00_AfABeJNSKiVzQKZeKtJTjUEfNUK0UJwpaU25NEVprYm5nA&oe=6533ADD1">
                  </div>
                  <div class="col-md-6" style="margin-left : -40px">
                    <form class="user-info-form">
                      <input readonly type="text" class="user-info-input" name="full_name_input" value =" Vu Hoang Tuan Thinh">
                      <input readonly type="text" class="user-info-input" name="date_of_birth_input" value ="6/2/2002">
                      <input readonly type="text" class="user-info-input" name="phone_input" value ="0785524579">
                      <input readonly type="text" class="user-info-input" name="citizen_id_input" value ="051202001724">
                      <input readonly type="text" class="user-info-input" name="role_input" value ="Quản trị viên"> 
                    </form>
                    <button onclick="edit(event)" id="edit_btn">Chỉnh sửa</button> 
                    <button onclick="save(event)" id="save_btn" style="display : none">Lưu</button>
                    <button onclick="cancel(event)" id="cancel_btn"  style="display : none">Hủy</button> 
    <script>
         $(document).ready(function(){
          $('#edit_btn').on('click',function(){
            $('#save_btn').show();
            $('#cancel_btn').show();
            $('.user-info-input').removeAttr("readonly");
          });
          
          $('#cancel_btn').on('click',function(){
            $('#save_btn').hide();
            $('#cancel_btn').hide();
            $('.user-info-input').attr("readonly", "readonly");
          });

        });
    </script>
                    
                  </div>
                 </div>
        </div>
        <div class="col-md-6">
        <label>dsdsdsd</label>
        </div>
      </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
