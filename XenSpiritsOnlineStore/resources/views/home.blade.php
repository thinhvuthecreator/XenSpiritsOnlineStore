<html>
    

    <head>
      <title>Xen. Spirits®</title>
      <link rel="stylesheet" href="{{asset('CSS/homestyle.css')}}">
      <link rel="stylesheet" href="{{asset('CSS/grid.css')}}">
      <link rel="icon" href="{{asset('Resource/XenTitleIcon.png')}}" type="image/icon type">
    </head>    

    <body>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

      <div class="OnTopHomePage">
      <h1 class="XenTopPage">XEN.SPIRITS ®</h1>
      <img class="XenLogo" 
           src="{{asset('Resource/xen-logo-top-1.png')}}"
           alt="img">
      </img> 
      <img class="XenLogo" 
           src="{{asset('Resource/xen-logo-top.png')}}"
           alt="img">
      </img>
      <hr class="hr-top"></hr>
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
         @if( isset($_SESSION['login_status']) && $_SESSION['login_status'] == "Logged")
         <li id="invisible-li"><a>ttttttttttttttttttttt</a></li>
        </ul>
          <ul id="user-logged-status">
               <li id="user-btn" ><a href="http://localhost:8000/profile">{{ $_SESSION["client_name"]}}</a></li>
               <li id="logout-btn"><a href="{{ route('logout') }}">Đăng xuất</a></li>
          <ul>
        </ul> 
        @else
        <li><a href="{{route('showlogin')}}">Đăng nhập / Đăng kí</a></li>
        </ul>
        @endif
      </ul>
     
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
      
      <header class="mainImageHome">
        <div class="aoVaTenSanPham">
          <div class="mainImageHome1-container">
          <a href="/products"><img class="mainImageHome1" src="{{asset('Resource/sample1.png')}}"></a>
          <p class="product-title">Xem sản phẩm</p>
          </img>
          </div>
          <h1 class="tenSanPham"> Xen. Spirits Basic Logo T-Shirt </h1>
          <button class="right-switch-btn"><img src="{{asset('Resource/right-arrow.png')}}"></img></buton>
          <button class="left-switch-btn"><img src="{{asset('Resource/left-arrow.png')}}"></img></buton>
        </div>
        
        <img class="mainImageHome2" 
             src="{{asset('Resource/model1.png')}}">
        </img>

        <ul class="social-media">
        <li><a href="https://www.facebook.com/profile.php?id=100092305197104" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/Facebook_Logo_%282019%29.png/1200px-Facebook_Logo_%282019%29.png"></img></a></li>
        <li><a href="https://www.instagram.com/xen.spirits/" target="_blank"><img src="https://i0.wp.com/soundings.com/wp-content/uploads/2021/03/INSTAGRAM-Logo-Round-1000px.png?ssl=1"></img></a></li>
        <li><a href="https://www.tiktok.com/@xen.spirits" target="_blank"><img src="https://static.vecteezy.com/system/resources/thumbnails/016/716/450/small/tiktok-icon-free-png.png" target="_blank"></img></a></li>
        </ul>
      </header>

  

      <h1 class="lookbook">XEN® LOOKBOOK</h1>
      
      <hr></hr>
      <div class="container-mother">
      <div class="lookbook-product-container">
       <div class="lookbook-product">
        <div class="lookbook-product-item">
         <img src="{{asset('Resource/lookbook1.png')}}" alt="img"><p class="item-title">Street Language Denim Jacket</p></img> 
         
        </div>
        <div class="lookbook-product-item">
         <img src="{{asset('Resource/lookbook2.png')}}" alt="img"> <p class="item-title">Xen. Gorrila Sweater</p></img> 
        
        </div>
        <div class="lookbook-product-item">
         <img src="{{asset('Resource/lookbook3.png')}}" alt="img"><p class="item-title">Xen. Super Big Logo T-Shirt</p></img> 
         
       </div>
       </div>
      </div>

      <div class="lookbook-product-container">
       <div class="lookbook-product">
      
       <div class="lookbook-product-item">
         <img src="{{asset('Resource/lookbook4.png')}}" alt="img"><p class="item-title">Drunk Logo Sweater</p></img> 
        </div>
         
        <div class="lookbook-product-item">
         <img src="{{asset('Resource/lookbook5.png')}}" alt="img"> <p class="item-title">Sign Of Christ T-Shirt</p></img> 
        </div>
        
        <div class="lookbook-product-item">
         <img src="{{asset('Resource/lookbook6.png')}}" alt="img"><p class="item-title">Basic Logo Area Denim Jacket</p></img> 
        </div>
      </div>
         
      </div>
    </div>
        
 
      <footer>
        <li> By Xen.Spirits® | Since2023.</li>
      </footer>
   
    </body>
      
  
  
</html>