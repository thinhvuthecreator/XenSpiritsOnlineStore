<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="{{asset('CSS/customer_wish_list.CSS')}}"></link>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!------ Include the above in your HEAD tag ---------->
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
	<div class="cart-wrap">
		<div class="container">
	        <div class="row">
			    <div class="col-md-12">		
			        <div class="table-wishlist">
					
				        <table cellpadding="0" cellspacing="0" border="0" width="100%">
				        	<thead>
					        	<tr>
									<th width="400"></th>
					        		<th width="150">Tên sản phẩm</th>
					        		<th width="35%">Giá sản phẩm</th>
					        		<th width="35%">Tình trạng</th>
					        		<th width="200"></th>
					        		<th width="200"></th>
					        	</tr>
					        </thead>
					        <tbody>
								@foreach($wishlists as $wishlist)
								 @php
								   $wishlist_id = $wishlist->id;
								   $product_id = $wishlist->product_id;
								   $product_image = DB::table('products')->where('id', $wishlist->product_id)->value('mainImage'); 
								   $product_name = DB::table('products')->where('id', $wishlist->product_id)->value('name'); 
								   $product_price = DB::table('products')->where('id', $wishlist->product_id)->value('price');
								 @endphp
					        	<tr>
									<td width="400">
									<div class="display-flex align-center">
										<a href = "/products/detail/{{ $product_id }}">
		                                    <div class="img-product">
		                                        <img src="/Resource/product_Images/{{$product_image}}" alt="" class="mCS_img_loaded">
		                                    </div>
										</a>
									</div>
									</td>
		    
					        		<td width="45%">
									<a href = "/products/detail/{{ $product_id }}">
					        		    <div class="name-product">
		                                       {{$product_name}}
									    </div>	
									</a>
	                                </td>
					        		<td width="35%" class="price">{{$product_price}}</td>
					        		<td width="35%"><span class="in-stock-box">Còn hàng</span></td>
					        		<td width="200"><button class="round-black-btn small-btn" style="margin-right : 90px">Add to Cart</button></td>
					        		<td width="200" class="text-center"><a href="{{ route('delete_item',[$wishlist_id]) }}" class="trash-icon" value="{{$wishlist_id}}"><i class="far fa-trash-alt" style="margin-right : 20px"></i></a></td>
					        	</tr>
					        	@endforeach
				        	</tbody>
				        </table>
				    </div>
					

			    </div>
			</div>
		</div>
	</div>
<!-- <script>
	$(".trash-icon").click(function(){
		var cf =  confirm('Xóa sản phẩm này ra khỏi yêu thích ?');
		if (cf === true)
		{
            var id = $(this).attr("value");
			
            $.ajax(
			{
            url: "wishlist/delete/"+id,
            type: "GET",
			dataType: 'json',
            data: {
                "id" : id,
            },
            success: function ()
            {
				
			}
			});
		
		    alert(id);
			
	    }
   });
</script> -->
	
</body>
	