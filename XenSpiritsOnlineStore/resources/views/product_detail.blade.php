<head>
      <title>Xen. Spirits® | Product Details</title>
      <link rel="stylesheet" href="{{asset('CSS/product_detail_style.css')}}">
      <link rel="icon" href="{{asset('Resource/XenTitleIcon.png')}}" type="image/icon type">

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    @include('/Reusable/on-top-page')
    <br><br>
    <div class="container">
        <div class="product-images">
            <br> <br> <br>
            <image class="product_img" src="/Resource/product_Images/{{ $product_selected->mainImage }}">

            @if($product_detail_images != null)
            @foreach($product_detail_images as $detail_image)
            <image class="product_img" src="/Resource/product_Images/detail_Images/{{$detail_image}}">
            @endforeach
            @endif

        </div>
        <div class="product-detail">
        <div class="detail-content">

            <h1 class="product-title">{{ $product_selected->name }}</h3>
            <h2 class="category-h2">{{ $product_category_name }}</h2>
            <h1>{{ $product_selected->price }} VND<h1>
                <div class="product-description">
                    <p> {{ $product_selected->productDescription }}</p>
                </div>
            <table>
            <tr>
            <td valign="center">
                Kích cỡ :   
            </td>
            <div class="size-space-container">
            <td><td> <td><td> <td><td> <td><td> <td><td>
            </div>
            @foreach($sizes as $size)
            <td>
            <button class="size-btn"> {{ $size->name }} </button>
            </td>
            @endforeach

            </tr>
            </table>
            <br>
            <table class="purchase-btn-container">
                <tr>
                    @php
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                      }
                     $current_account_id = $_SESSION["account_id"];
                    @endphp
                    <input type="text" id="product_id" style="display:none" value="{{ $product_selected->id }}"> 
                    <input type="text" id="account_id" style="display:none" value="{{  $current_account_id }}"> 
                    <td><button type="submit" id="add_wishlist_btn" class="purchase-btn">Thêm vào yêu thích</button></td>
                    <td><button type="submit" id="add_cart_btn" class="purchase-btn">Thêm vào giỏ hàng</button></td>
                </tr>
            <table>
        </div>
        </div>
    </div>
   
    <script>
        $(document).ready(function(){
            $("#add_wishlist_btn").click(function(){
                var product_id=$("#product_id").val();
                var account_id=$("#account_id").val();
                $.ajax({
                    url:'insert.php',
                    method:'POST',
                    data:{
                        product_id:product_id,
                        account_id:account_id
                    },
                   success:function(data){
                       alert(data);
                   }
                });
            });
        });
    </script>

</body>