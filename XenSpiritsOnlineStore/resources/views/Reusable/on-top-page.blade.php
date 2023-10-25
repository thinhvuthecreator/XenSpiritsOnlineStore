<head>
     <link rel="stylesheet" href="{{asset('CSS/on-top-page-style.css')}}" ></link>
</head>
<body>
<?php
          if(session_status() == PHP_SESSION_NONE)
          {
               session_start();
          }
        ?>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
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
      <hr></hr>
      <ul class="navigator-header">
        <li><a href="http://localhost:8000/">Trang chủ</a></li>
        <li><a href="http://localhost:8000/products">Sản phẩm</a></li>
        <li><a href="http://localhost:8000/wishlist">Giỏ hàng</a></li>
        <li><a href="http://localhost:8000/size-guide">Hướng dẫn kích cỡ</a></li>
        @if( isset($_SESSION['login_status']) && $_SESSION['login_status'] == "Logged")
        <li id="invisible-li"><a>ttttttttttttttttttttt</a></li>
     </ul>
          <ul id="user-logged-status">
               <li id="user-btn" ><a href="http://localhost:8000/profile">User123</a></li>
               <li id="logout-btn"><a href="{{ route('logout') }}">Đăng xuất</a></li>
          <ul>
        </ul> 
        @else
        <li><a href="{{ route('showlogin') }}">Đăng nhập / Đăng kí</a></li>
        </ul>
        @endif
<script>
        $(function() {
                $('#user-btn').hover(function() {
          $('#logout-btn').css('display', 'block');
                }, function() {
           // on mouseout, reset the background colour
          $('#logout-btn').hover(function(){
               $('#logout-btn').css('display','block')
          } , function(){ $('#logout-btn').css('display','none'); })
          });

          $('#user-btn').hover(function() {
          $('#logout-btn').css('display', 'block');
                }, function() {
           // on mouseout, reset the background colour
          $('#logout-btn').css('display','none');
          });

          $('#logout-btn').hover(function(){
               $('#logout-btn').css('display','block')
          } , function(){ $('#logout-btn').css('display','none'); })
});
</script>

 </div>
 
</body>