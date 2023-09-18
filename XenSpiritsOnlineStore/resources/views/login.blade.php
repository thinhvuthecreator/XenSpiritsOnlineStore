<head>
      <title>Xen. Spirits® | Login</title>
      <link rel="stylesheet" href="{{asset('CSS/loginstyle.css')}}">
      <link rel="stylesheet" href="{{asset('CSS/grid.css')}}">
      <link rel="icon" href="{{asset('Resource/XenTitleIcon.png')}}" type="image/icon type">
</head>
<body>
    @include('Reusable/on-top-page')
    <div class="login-box">
          <div class="login-box-background">
          </div>        
        <form class="login-form" action="/login" method="POST">
            <input name="username_input" class="username-box" type="text" placeholder="Email"></input>
            <input name="password_input" class="password-box" type="text" placeholder="Mật khẩu"></input>
            <input class="login-button" type="submit" value="Đăng nhập"></input>
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
        </form>
        <h2>ĐĂNG NHẬP</h2>
        <p>Chưa có tài khoản ? <a href="http://localhost:8000/register" style="color:cyan">Đăng kí</a></p>
    </div>
       
    
</body>