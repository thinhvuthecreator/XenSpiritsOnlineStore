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
                <div>
                <li><input class="text-input" type="text" placeholder="Email"/></li>
                <div>
                <div>
                <li><input class="text-input" type="text" placeholder="Số điện thoại"/></li>
                <div>
                <div>
                <li><input class="text-input" type="text" placeholder="Mật khẩu"/></li>
                <div>
                <div>
                <li><input class="text-input" type="text" placeholder="Xác nhận mật khẩu"/></li>
                <div>
                <li><input class="text-input" type="datetime-local" placeholder="Ngày sinh"/></li>
                <div>
                <li><input class="text-input" type="text" placeholder="Giới tính"/></li>
                <div>
                <div>
                <li><input class="submit-input" type="submit" value="ĐĂNG KÍ"/></li>
                <div>
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
            </ul>
            </form>
            <h2>ĐĂNG KÍ</h2>
            <p>Đã có tài khoản ? <a href="http://localhost:8000/login" style="color:cyan">Đăng nhập</a></p>
        </div>
</body>