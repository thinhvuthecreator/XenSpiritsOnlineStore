<head>
      <title>Xen. Spirits®</title>
      <link rel="icon" href="{{asset('Resource/XenTitleIcon.png')}}" type="image/icon type">
      <link rel="stylesheet" href="{{asset('CSS/customer-profile-style.css')}}">
</head>

<body>
    @include('Reusable/on-top-page')
 <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script> -->
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<aside class="main-sidebar">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul  data-widget="treeview" role="menu" data-accordion="false" class="sidebar-ul">
          <li class="nav-item">
            <a href="#" class="nav-link" id="info" onclick="click(event)">            
              <p >
                Thông tin
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" id="cart" onclick="click(event)">
              <p >
                Giỏ hàng
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" id="bill" onclick="click(event)">
              <p>
                Đã mua
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script type="text/javascript">
    $(document).ready(function(){
        $("#info").click(function(e){
            e.preventDefault();
        $("#contentt").load("/profile-info");
        });
        $("#cart").click(function(e){
            e.preventDefault();
        $("#contentt").load("/products");
        });
    });
</script>


<div class="contentt" id="contentt">
</div>

</body>
