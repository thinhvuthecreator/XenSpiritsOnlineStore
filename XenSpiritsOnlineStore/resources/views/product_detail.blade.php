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
            <image class="product_img" src="https://ithk-pro-itmall-item.oss-cn-hongkong.aliyuncs.com/2/product/0ZXLJM140058LGRX/0ZXLJM140058LGRX-pdp-1.jpg?x-oss-process=image/resize,m_pad,h_750,w_600/auto-orient,1/quality,Q_80">
            <image class="product_img" src="https://ithk-pro-itmall-item.oss-cn-hongkong.aliyuncs.com/2/product/0ZXLJM140058LGRX/0ZXLJM140058LGRX-pdp-2.jpg?x-oss-process=image/resize,m_pad,h_750,w_600/auto-orient,1/quality,Q_80">
            <image class="product_img" src="https://ithk-pro-itmall-item.oss-cn-hongkong.aliyuncs.com/2/product/0ZXLJM140058LGRX/0ZXLJM140058LGRX-pdp-3.jpg?x-oss-process=image/resize,m_pad,h_750,w_600/auto-orient,1/quality,Q_80">
            <image class="product_img" src="https://ithk-pro-itmall-item.oss-cn-hongkong.aliyuncs.com/2/product/0ZXLJM140058LGRX/0ZXLJM140058LGRX-pdp-4.jpg?x-oss-process=image/resize,m_pad,h_750,w_600/auto-orient,1/quality,Q_80">
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