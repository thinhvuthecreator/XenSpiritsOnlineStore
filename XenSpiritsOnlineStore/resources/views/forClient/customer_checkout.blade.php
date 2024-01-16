
@extends('forClient.profile')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<link rel="stylesheet" href="{{asset('CSS/check-out.css')}}">
@section('content')	
<div class="cart-wrap">
		<div class="container">
	        <div class="row">
			    <div class="col-md-9">		
			        <div class="table-wishlist">					
				        <table cellpadding="0" cellspacing="0" border="0" width="100%" id="table-cart">
				        	<thead>
					        	<tr>
									<th width="400"></th>
					        		<th width="150">Tên sản phẩm</th>
					        		<th width="35%">Giá sản phẩm</th>
					        		<th width="55%">Số lượng</th>
				
					        	</tr>
					        </thead>
					        <tbody>
                                @if($carts != null)
                                @php
                                $total_price = 0;
                                @endphp
								@foreach($carts as $cart)
								 @php
								   $cart_id = $cart->id;
								   $product_id = $cart->product_id;
								   $product_image = DB::table('products')->where('id', $cart->product_id)->value('mainImage'); 
								   $product_name = DB::table('products')->where('id', $cart->product_id)->value('name'); 
								   $product_price = DB::table('products')->where('id', $cart->product_id)->value('price');
                                   $quantity = $cart->quantity;
                                   $total_price += $product_price * $quantity; 
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
					        		<td width="85%" class="price">{{$product_price}}</td>
					        		<td width="55%"><span class="in-stock-box" style="margin-right : 90px">{{ $quantity }}</span></td>
									<!-- <td width="200"><a href="{{ route('add_to_cart', ['item_id' => $product_id]) }}" class="round-black-btn small-btn" style="margin-right : 90px" value="{{$product_id}}">Add to Cart</a></td> -->
		
					        	</tr>
					        	@endforeach
                                @endif
				        	</tbody>
				        </table>
				    </div>
			    </div>
                <div class="col-md-3" id="checkout-info">
                 <label>Tổng số tiền </label> 
                 <h6 style="color : white"> {{$total_price}} VNĐ </h6> 
                 <label>Địa chỉ nhận hàng</label>
                 <h6 style="color : white"> {{ $address }} </h6>
                 <label>Số điện thoại</label>
                 <h6 style="color : white"> {{ $phone }} </h6>
                 <label>Hình thức thanh toán</label>
                    <select name="payment_choices" id="payment_choices_select">
                     <option value="cod">Thanh toán khi nhận hàng</option>
                     <option value="momo">Thanh toán qua MOMO</option>
                     <option value="bank">Thanh toán qua ngân hàng</option>
                    </select>
                 <button id="checkout-btn-confirm">Xác nhận thanh toán</button>
                </div>
               </div>
			</div>
		</div>
	</div>


	
<script>
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

	$(".trash-icon").click(function(){
		event.preventDefault();
	    var cf =  confirm('Xóa sản phẩm này ra khỏi giỏ hàng ?');
		if (cf === true)
		{
            var id = $(this).attr("value");			
            $.ajax(
			{
			dataType : 'json',
            url: "./cart/delete/" + id,
            type: "POST",
			data: { "id" : id },
            success: function (rs)
            {
				if(rs.success)
				{
					alert(rs.message);
				}
				else
				{
					alert(" o o ! ");
				}
			}, 
			error : function(data, textStatus, errorThrown)
			{
				alert(errorThrown);
			}
			});
	    }
   });
   

   $(".small-btn").click(function(event){
		event.preventDefault();
	
            var id = $(this).attr("value");			
            $.ajax(
			{
			dataType : 'json',
            url: "./cart/checkout/" + id,
            type: "POST",
			data: { "item_id" : id },
            success: function (rs)
            {
				if(rs.success)
				{
					alert(rs.message);
				}
				else
				{
					alert(" o o ! ");
				}
			}, 
			error : function(data, textStatus, errorThrown)
			{
				alert(errorThrown);
			}
			});
   });

   $('body').on('change','.check-out-checkbox',function(event){
        event.preventDefault();
        var rowcount = $('#table-cart tr').length - 1;
        var str = "";
        var checkbox = $(this).parents('#table-cart').find('tr td input:checkbox');
        var i = 0;
        checkbox.each(function () {
                if (this.checked) {
                    var _id = $(this).val();
                    if (i === 0) {
                        str += _id;
                    } else {
                        str += "," + _id;
                    }
                    i++;
                } else {
                    checkbox.attr('selected', '');
                }
            });
            if(str.length > 0)
            {
                $('#check-out-button').css("visibility","visible");
            }
            else
            {
                $('#check-out-button').css("visibility","hidden");
            }
            if( i === rowcount)
            {
               $('#all-checkbox').prop('checked', true);
            }
            else
            {
                $('#all-checkbox').prop('checked', false);
            }
   });

   $('body').on('click','#check-out-button',function(event){
        event.preventDefault();
        var rowcount = $('#table-cart tr').length - 1;
        var str = "";
        var checkbox = $(this).parents('#table-cart').find('tr td input:checkbox');
        var i = 0;
        checkbox.each(function () {
                if (this.checked) {
                    var _id = $(this).val();
                    if (i === 0) {
                        str += _id;
                    } else {
                        str += "," + _id;
                    }
                    i++;
                } else {
                    checkbox.attr('selected', '');
                }
            });
            if(str.length > 0)
            {
               cf = confirm("Thanh toán các sản phẩm này ? ");
               if(cf === true)
               {
                   $.ajax(
                       {
                           dataType: 'json',
                           url: "./cart/checkout",
                           type: "GET",
                           data: { "ids": str },
                           success: function (rs) {
                               if (rs.success) {
                                   alert(rs.message);
                               }
                               else {
                                   alert(" o o ! ");
                               }
                           },
                           error: function (data, textStatus, errorThrown) {
                               alert(errorThrown);
                           }
                       });
               }
            }
            else
            {
                alert("Bạn chưa chọn sản phẩm để thanh toán");
            }     
   });

   $('body').on('change','#all-checkbox',function(event){
        event.preventDefault();
        var checkbox = $(this).parents('#table-cart').find('tr td input:checkbox');
        if(this.checked)
        {
            checkbox.each(function () {
                $(this).prop('checked', true);
            });
        }
        else
        {
            checkbox.each(function () {
                $(this).prop('checked', false);
            });
        }
   });
  
      
   $('body').on('click','#checkout-btn-confirm',function(event){
        event.preventDefault();
        var rowcount = $('#table-cart tr').length - 1;
        var str = "";
        var checkbox = $(this).parents('#table-cart').find('tr td input:checkbox');
        var i = 0;
        checkbox.each(function () {
                if (this.checked) {
                    var _id = $(this).val();
                    if (i === 0) {
                        str += _id;
                    } else {
                        str += "," + _id;
                    }
                    i++;
                } else {
                    checkbox.attr('selected', '');
                }
            });
		   window.location.href = "./cart/checkout-confirm/" + str;

        
   });
 

</script>

@endsection

	