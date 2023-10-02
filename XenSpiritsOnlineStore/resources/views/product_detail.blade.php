<head>
      <title>Xen. Spirits® | Product Details</title>
      <link rel="stylesheet" href="{{asset('CSS/product_detail_style.css')}}">
      <link rel="icon" href="{{asset('Resource/XenTitleIcon.png')}}" type="image/icon type">

</head>

<body>
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
          
                <button class="size-btn">M</button>
            </td>
            <td>
                <button class="size-btn">L</button>
            </td>
            <td>
                <button class="size-btn">XL</button>
            </td>

            </tr>
            </table>
            <br>
            <table class="purchase-btn-container">
                <tr>
                    <td><button class="purchase-btn">Thêm vào giỏ hàng</button></td>
                    <td><button class="purchase-btn">Mua ngay</button></td>
                </tr>
            
            <table>

        </div>
        </div>
    </div>
   
</body>