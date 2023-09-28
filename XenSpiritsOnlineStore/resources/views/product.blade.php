<head>
    <title>Xen. Spirits® | Products</title>
    <link rel="stylesheet" href="{{asset('CSS/productstyle.css')}}">
    <link rel="icon" href="{{asset('Resource/XenTitleIcon.png')}}" type="image/icon type">

</head>
<body>
    @include('/Reusable/on-top-page')
 
    <br><br>
    <table>
        <tr>
          @foreach($products as $product)
          <td> 
            <div class="container">
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