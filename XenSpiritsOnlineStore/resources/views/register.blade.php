<head>
      <title>Xen. Spirits® | Register</title>    
      <link rel="stylesheet" href="{{asset('CSS/registerstyle.css')}}">
      <link rel="icon" href="{{asset('Resource/XenTitleIcon.png')}}" type="image/icon type">

</head>
<body>
    @include('Reusable/on-top-page')

    <div class="register-box-background">

    </div>
        <div class="register-box">
            <form method="POST" action="/register">
            <ul>
                <li>
                <input class="text-input" name="email_input" type="text" placeholder="Email">
                </li>
                <li>
                <input class="text-input" name="phone_input" type="text" placeholder="Số điện thoại">
                </li>
               <li>
                   <input class="text-input" name="password_input" type="password" placeholder="Mật khẩu">
               </li>
               
              <li>
                <input class="text-input" name="passwordconfirm_input" type="password" placeholder="Xác nhận mật khẩu">
              </li>
              <li>
                <input class="text-input" name="dateofbirth_input" type="datetime-local" placeholder="Ngày sinh">
              </li>
              <li>
               <input class="text-input" name="gender_input" type="text" placeholder="Giới tính">
              </li>
               <li>
                <input class="submit-input" type="submit" value="ĐĂNG KÍ">
              </li>
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            </ul>
            @if(session('success'))
    <p class="alert alert-success">
      {{session('success')}}
    </p>
  @endif
            </form>
            <h2>ĐĂNG KÍ</h2>
            <p>Đã có tài khoản ? <a href="http://localhost:8000/login" style="color:cyan">Đăng nhập</a></p>
        </div>
</body>