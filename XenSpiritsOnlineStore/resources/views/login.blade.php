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
        <form class="login-form" action="/register" method="POST">
            <input class="username-box" type="text"></input>
            <input class="password-box" type="text"></input>
            <input class="login-button" type="submit" value="Đăng nhập"></input>
            <input class="register-button" type="submit" value="Đăng kí"></input>
        </form>
        <h2>ĐĂNG NHẬP</h2>
       
        <div class="user-pass">
            <div>
               <p class="username">Tên đăng nhập</p>
            </div>
            <div>
               <p class="password">Mật khẩu</p>
            </div>
        </div>
    
    </div>
</body>