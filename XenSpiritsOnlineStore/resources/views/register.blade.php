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
        
                
                <input class="text-input" type="text" placeholder="Email"/>
              
              
                <input class="text-input" type="text" placeholder="Số điện thoại"/>
             
             
               <input class="text-input" type="password" placeholder="Mật khẩu"/>
               
              
                <input class="text-input" type="password" placeholder="Xác nhận mật khẩu"/>
             
                <input class="text-input" type="datetime-local" placeholder="Ngày sinh"/>
            
               <input class="text-input" type="text" placeholder="Giới tính"/>
              
               
                <input class="submit-input" type="submit" value="ĐĂNG KÍ"/>
              
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
            </form>
            <h2>ĐĂNG KÍ</h2>
            <p>Đã có tài khoản ? <a href="http://localhost:8000/login" style="color:cyan">Đăng nhập</a></p>
        </div>
</body>