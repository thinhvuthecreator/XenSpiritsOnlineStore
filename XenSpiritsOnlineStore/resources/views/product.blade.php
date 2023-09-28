<head>
    <title>Xen. Spirits® | Products</title>
    <link rel="stylesheet" href="{{asset('CSS/productstyle.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/grid.css')}}">
    <link rel="icon" href="{{asset('Resource/XenTitleIcon.png')}}" type="image/icon type">
</head>
<body>
    @include('/Reusable/on-top-page')
    <br><br>
    <div class="filter">
    </div>
    <table>
        <tr>
          @foreach($products as $product)
          <td> 
            <div class="container">
                <!-- <image src="https://uk.bape.com/cdn/shop/products/001ZPJ306002_BLK_A.jpg?v=1674734358&width=2400" alt="ảnh sản phẩm"> -->
                <div class="background">
                <image src="Resource/product_Images/{{$product->mainImage}}" alt="ảnh sản phẩm">
                <p class="item-title">{{ $product->name }}</p>
                </image>
                </div>
                </image>
            </div>
          </td>
          @endforeach
        </tr>
    </table>



</body>