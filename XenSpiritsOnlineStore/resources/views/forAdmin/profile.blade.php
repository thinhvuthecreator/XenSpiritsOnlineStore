@extends('Layout.Admin')


@section('Title')
<title>Xen. Spirits® | Quản trị</title>
@endsection


@section('Content')

<style></style>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('./Partial/content_header', ['url1' => 'Profile' , 'url2' => 'Admin', 'url3' => 'Profile'])
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
                 <div class="row">
                  <div class="col-md-6">
                  <label id="user-info-title" >Thông tin cá nhân</label>
                    <img id="image" src="https://scontent.fhan4-3.fna.fbcdn.net/v/t39.30808-6/391698355_801947288396747_9208904244830062786_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=5f2048&_nc_ohc=l4b5Qnn45iMAX_H53pR&_nc_ht=scontent.fhan4-3.fna&oh=00_AfABeJNSKiVzQKZeKtJTjUEfNUK0UJwpaU25NEVprYm5nA&oe=6533ADD1">
                  </div>
                   <div class="col-md-6" id="user-info-container">
                    <form class="user-info-form">
                      <label>Tên</label><br>
                      <input readonly type="text" class="user-info-input" name="full_name_input" value =" Vu Hoang Tuan Thinh"><br>
                      <label>Ngày sinh</label><br>
                      <input readonly type="text" class="user-info-input" name="date_of_birth_input" value ="6/2/2002"><br>
                      <label>Số điện thoại</label><br>
                      <input readonly type="text" class="user-info-input" name="phone_input" value ="0785524579">
                      <label>Căn cước công dân</label><br>
                      <input readonly type="text" class="user-info-input" name="citizen_id_input" value ="051202001724"><br>
                      <label>Vai trò</label><br>
                      <input readonly type="text" class="user-info-input" name="role_input" value ="Quản trị viên"><br>
                      <input type="submit" onclick="save(event)" id="save_btn" value="Lưu">
                    </form>
                    <button onclick="edit(event)" id="edit_btn">Chỉnh sửa</button> 
                    <button onclick="cancel(event)" id="cancel_btn">Hủy</button> 
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

          $('#save_acc_btn').onclick('click',function(){
            
          });
        });
    </script>
            </div>
         </div>
        </div>
        <div class="col-md-6" id="account-info-container">
        <label id="account-info-title" >Thông tin tài khoản</label>
        <form class="account-info-form">
                    <label>Email</label><br>
                      <input readonly type="text" class="user-info-input" name="email_input" value ="thinhvuh@gmail.com"><br>
                    <label>Mật khẩu</label><br>
                      <input readonly type="text" class="user-info-input" name="password_input" value ="lonhuy8102002"><br>
                    <input type="submit" onclick="save(event)" id="save_acc_btn" value="Lưu">
                    </form>
                    <button onclick="edit(event)" id="edit_acc_btn">Chỉnh sửa</button> 
                    <button onclick="cancel(event)" id="cancel_acc_btn" >Hủy</button> 
    <script>
         $(document).ready(function(){
          $('#edit_acc_btn').on('click',function(){
            $('#save_acc_btn').show();
            $('#cancel_acc_btn').show();
            $('.user-info-input').removeAttr("readonly");
          });
          
          $('#cancel_acc_btn').on('click',function(){
            $('#save_acc_btn').hide();
            $('#cancel_acc_btn').hide();
            $('.user-info-input').attr("readonly", "readonly");
          });

          $('#save_acc_btn').onclick('click',function(){
             var email = $('#email_input').val();
             var password = $('#password_input').val();
          });

        });
    </script>
        </div>
      </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
