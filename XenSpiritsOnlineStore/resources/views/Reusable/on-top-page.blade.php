<head>
     <link rel="stylesheet" href="{{asset('CSS/on-top-page-style.css')}}" ></link>
</head>
<body>
<div class="OnTopHomePage">
      <h1 class="XenTopPage">XEN.SPIRITS ®</h1>
      <img class="XenLogo2" 
           src="{{asset('Resource/xen-box-logo2.png')}}"
           alt="img">
      </img> 
      <img class="XenLogo1" 
           src="{{asset('Resource/xen-box-logo.png')}}"
           alt="img">
      </img>
      
      <ul class="navigator-header">
        <li><a href="http://localhost:8000/">Trang chủ</a></li>
        <li><a href="http://localhost:8000/products">Sản phẩm</a></li>
        <li><a href="http://localhost:8000/wishlist">Giỏ hàng</a></li>
        <li><a href="http://localhost:8000/size-guide">Hướng dẫn kích cỡ</a></li>
        <?php
          if(session_status() == PHP_SESSION_NONE)
          {
               session_start();
          }
        ?>
        @if($_SESSION['login_status'] == "Logged")
        <li><a href="http://localhost:8000/profile">User123</a></li>
        @else
        <li><a href="http://localhost:8000/login">Đăng nhập / Đăng kí</a></li>
        @endif
      </ul>
      <hr></hr>
 </div>
 
</body>