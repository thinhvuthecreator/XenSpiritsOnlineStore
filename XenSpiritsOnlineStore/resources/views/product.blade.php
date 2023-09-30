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
                <a href="{{ route('product_detail_client',['id' => $product->id]) }}"><image class="product_img" src="/Resource/product_Images/{{$product->mainImage}}" alt="ảnh sản phẩm"></a>
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