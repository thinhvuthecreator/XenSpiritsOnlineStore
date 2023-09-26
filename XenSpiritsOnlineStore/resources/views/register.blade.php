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
                <input class="text-input" name="email_input" type="text" placeholder="Email" value="{{old('email_input')}}">
                @error('email_input')
                    <span style="color : red;">{{$message}}</span>
                @enderror
                </li>
               <li>
                   <input class="text-input" name="password_input" type="password" placeholder="Mật khẩu">
                   @error('password_input')
                    <span style="color : red;">{{$message}}</span>
                @enderror
               </li>
               
              <li>
                <input class="text-input" name="passwordconfirm_input" type="password" placeholder="Xác nhận mật khẩu">
                @error('passwordconfirm_input')
                    <span style="color : red;">{{$message}}</span>
                @enderror
              </li>
               <li>
                <input class="submit-input" type="submit" value="ĐĂNG KÍ">
              </li>
              
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            </ul>
            @if(session('success'))
            <div class="successfully-Created-div">
          
              <span class="success-span"> {{session('success')}} </span>
            
            </div>
  @endif
            </form>
            <h2>ĐĂNG KÍ</h2>
            <p>Đã có tài khoản ? <a href="http://localhost:8000/login" style="color:cyan">Đăng nhập</a></p>
        </div>
</body>