<head>
  <link rel="stylesheet" href="{{asset('CSS/profile-info-style.css')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

<div class="row">
        <div class="col-md-6" id="user-info-container">
                     <label id="user-info-title" >Thông tin cá nhân</label>
                     <img id="image" src="https://i.pinimg.com/originals/9e/17/6f/9e176f0eb722cdaf920fd267c3a4f2a6.jpg">
                    <form class="user-info-form">
                      <label>Tên</label><br>
                      <input readonly type="text" class="user-info-input" name="full_name_input" value =" Vu Hoang Tuan Thinh"><br>
                      <label>Ngày sinh</label><br>
                      <input readonly type="text" class="user-info-input" name="date_of_birth_input" value ="6/2/2002"><br>
                      <label>Số điện thoại</label><br>
                      <input readonly type="text" class="user-info-input" name="phone_input" value ="0785524579"><br>
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

</body>