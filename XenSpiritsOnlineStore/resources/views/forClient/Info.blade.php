<head>
  <link rel="stylesheet" href="{{asset('CSS/profile-info-style.css')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
@php
if (session_status() == PHP_SESSION_NONE) {
                        session_start();
}
$account = DB::table('accounts')->where("client_id", $_SESSION["client_id"])->first();
$user = DB::table('customers')->where("id", $_SESSION["client_id"])->first();
                     $_SESSION["client_email"] = $account->email;
                     $_SESSION["client_name"] = $user->full_name;
                     $_SESSION["client_phone"] = $user->phone;
                     $_SESSION["client_address"] = $user->address;
                     $_SESSION["client_image"] = $user->image;
@endphp
<div class="row">
        <div class="col-md-6" id="user-info-container">
                     <label id="user-info-title">Thông tin cá nhân</label>
                     <img id="image" src="https://i.pinimg.com/originals/9e/17/6f/9e176f0eb722cdaf920fd267c3a4f2a6.jpg">
                     <form class="user-info-form" method="POST" action="{{ route('customer.profile.changeData') }}">
                     @csrf 
                     <label>Tên</label><br>
                      <input readonly type="text" class="user-info-input" name="full_name_input" value ="{{ $_SESSION['client_name'] }}"><br>
                      <label>Số điện thoại</label><br>
                      <input readonly type="text" class="user-info-input" name="phone_input" value ="{{ $_SESSION['client_phone'] }}"><br>
                      <label>Địa chỉ</label><br>
                      <input readonly type="text" class="user-info-input" name="address_input" value ="{{ $_SESSION['client_address'] }}"><br>
                      <input type="submit" id="save_btn" value="Lưu">
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
        <div class="col-md-6" id="account-info-container">
        <label id="account-info-title" >Thông tin tài khoản</label>
        <form class="account-info-form" method="POST" action="{{ route('customer.profile.changepassData') }}">
                   @csrf
                    <label>Email</label><br>
                      <input readonly type="text" class="user-info-input" name="email_input" value ="{{ $_SESSION['client_email'] }}"><br>
                    <label class="title-pass">Nhập mật khẩu cũ</label><br>
                      <input readonly type="password" class="user-info-input" id="old_pass_input" name="old_pass_input"><br>
                      <label class="title-pass">Nhập mật khẩu mới</label><br>
                      <input readonly type="password" class="user-info-input" id ="new_pass_input" name="new_pass_input"><br>
                      <label class="title-pass">Xác nhận mật khẩu mới</label><br>
                      <input readonly type="password" class="user-info-input" id ="confirm_pass_input" name="confirm_pass_input"><br>
                    <input type="submit" onclick="save(event)" id="save_acc_btn" value="Lưu">
                    </form>
                    
                    <button onclick="edit(event)" id="edit_acc_btn">Chỉnh sửa</button> 
                    <button onclick="cancel(event)" id="cancel_acc_btn" >Hủy</button> 
    <script>
         $(document).ready(function(){
          $('#edit_acc_btn').on('click',function(){
            $('#save_acc_btn').show();
            $('#cancel_acc_btn').show();
            $('#old_pass_input').show();
            $('#new_pass_input').show();
            $('#confirm_pass_input').show();
            $('.title-pass').show();
            $('.user-info-input').removeAttr("readonly");
          });
          
          $('#cancel_acc_btn').on('click',function(){
            $('#save_acc_btn').hide();
            $('#cancel_acc_btn').hide();
            $('#old_pass_input').hide();
            $('#new_pass_input').hide();
            $('#confirm_pass_input').hide();
            $('.title-pass').hide();
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

</body>