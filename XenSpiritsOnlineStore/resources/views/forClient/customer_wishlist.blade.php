<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="{{asset('CSS/customer_wish_list.CSS')}}"></link>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
	<div class="cart-wrap">
		<div class="container">
	        <div class="row">
			    <div class="col-md-12">		
			        <div class="table-wishlist">
					
				        <table cellpadding="0" cellspacing="0" border="0" width="100%">
				        	<thead>
					        	<tr>
									<th width="400"></th>
					        		<th width="150">Product Name</th>
					        		<th width="35%">Unit Price</th>
					        		<th width="35%">Stock Status</th>
					        		<th width="200"></th>
					        		<th width="200"></th>
					        	</tr>
					        </thead>
					        <tbody>
								@foreach($wishlists as $wishlist)
								 @php
								   $product_image = DB::table('products')->where('id', $wishlist->product_id)->value('mainImage'); 
								   $product_name = DB::table('products')->where('id', $wishlist->product_id)->value('name'); 
								   $product_price = DB::table('products')->where('id', $wishlist->product_id)->value('price');
								 @endphp
					        	<tr>
									<td width="400">
									<div class="display-flex align-center">
		                                    <div class="img-product">
		                                        <img src="/Resource/product_Images/{{$product_image}}" alt="" class="mCS_img_loaded">
		                                    </div>
									</div>
									</td>
		    
					        		<td width="45%">
					        		<div class="name-product">
		                                       {{$product_name}}
		                            </div>	
	                                </td>
					        		<td width="35%" class="price">{{$product_price}}</td>
					        		<td width="35%"><span class="in-stock-box">In Stock</span></td>
					        		<td width="200"><button class="round-black-btn small-btn" style="margin-right : 90px">Add to Cart</button></td>
					        		<td width="200" class="text-center"><a href="#" class="trash-icon"><i class="far fa-trash-alt" style="margin-right : 20px"></i></a></td>
					        	</tr>
					        	@endforeach
				        	</tbody>
				        </table>
					
				    </div>
			    </div>
			</div>
		</div>
	</div>
</body>
	