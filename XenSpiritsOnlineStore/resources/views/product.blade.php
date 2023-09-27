<head>
    <title>Xen. Spirits® | Products</title>
    <link rel="stylesheet" href="{{asset('CSS/productstyle.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/grid.css')}}">
    <link rel="icon" href="{{asset('Resource/XenTitleIcon.png')}}" type="image/icon type">
</head>
<body>
    @include('/Reusable/on-top-page')

    <table>
        <tr>
          @foreach($product_images as $product_image)
          <td>{{ $product_image->name }}</td>
          @endforeach
        </tr>
    </table>

</body>