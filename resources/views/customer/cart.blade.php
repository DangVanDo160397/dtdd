@extends('customer.layout.app')
@section('title','Giỏ hàng')
@section('content')
	@if(Session::has('cart'))
		<?php $cart = Session('cart');
			$list_product = $cart->items;
			$json = json_encode( $list_product );
		?>
	@endif
	<div class="container" style="margin-top: 30px; margin-bottom: 30px;">
		<div class="row" >
			@if(!Auth::guard('customer')->check())
                    <div class="alert alert-danger">
                        Bạn phải đăng nhập để tiến hành đặt hàng.
                    </div>
      @else

				<!-- Check session -->
				@if(Session::has('cart'))
				<div class="col-md-9">
					<a href="{{route('customer.cart.deleteall')}}"><i class="fas fa-trash-alt"></i> Xóa toàn bộ</a>
					<table class="table table-bordered">
						<style>
							th{
								background-color: #37474f;
    color: white;
							}
						</style>
						<tr>
							<th>Tên</th>
							<th>Số lượng</th>
							<th>Đơn giá</th>
							<th></th>
						</tr>

						@foreach($list_product as $product)
						<tr>
							<td>
								<img src="{{ asset('storage/'.$product['item']['thumbnail']) }}" alt="" style="width: 50px; height: auto; float: left">
								{{$product['item']['name']}}
							</td>
							<style>
								td>p{
									display: inline-block;
									padding: 5px 10px;
									border: 1px solid #ccc;
									cursor: pointer;
								}
								td>p:hover{
									background-color: #ccc;
									color:white;
								}
							</style>
							<td class="change-qty" data-cart="{{ $json }}" data-quantity="{{$cart->totalQuantity}}"  data-gia="{{ $product['item']['price'] }}" data-Price="{{ $cart->totalPrice }}">
								<p class="down">-</p>
								<p class="total" data-id="{{ $product['item']['product_id'] }}">{{ $product['qty'] }}</p>
								<p class="up">+</p>
							</td>
							<td>{{number_format($product['item']['price'])}} đ</td>
							<td><a href="{{route('customer.cart.delete',$product['item']['product_id'])}}"><i class="fas fa-trash-alt"></i></a></td>
						</tr>
						@endforeach
						
					</table>
				</div>
				<input type="hidden"	id="totalQuantity" value="{{$cart->totalQuantity}}" name="totalQuantity">
				<input type="hidden"	id="totalPrice" value="{{$cart->totalPrice}}" name="totalPrice">

				<div class="col-md-3">
					<div class="h3">Chi tiết</div>
					<p>Tổng số lượng sản phẩm: <span id="gan_soluong">{{$cart->totalQuantity}}</span></p>
					<p>Tổng tiền: <span id="gan_tongtien" >{{number_format($cart->totalPrice)}} </span> đ</p>
					<form action="{{route('customer.post.order')}}" method="post">
						{{ csrf_field()}}
						<input type="hidden" value="" name="cart" id="cart">
						<input type="hidden" value="" name="list_product">
						<input type="submit" value="Đặt hàng" onclick="window.confirm('Xác nhận đặt hàng?')" class="btn btn-danger">
					</form>
				</div>

				<!-- Sau khi đặt hàng -->
				<div class="row">
					<div class="col-md-6" style="text-align: center;">

						@if(session('alert'))

						<div class="alert alert-danger" style="margin-top: 40px;">
							Đặt hàng thành công, mã đơn hàng của bạn là: <strong>{{ session('alert')}}</strong> 
							<p><a href="{{route('customer.index')}}">Tiếp tục mua hàng?</a><a href="{{route('customer.profile.index')}}">&nbsp;&nbsp;Quản lý đơn hàng</a></p>
						</div>


						@endif
					</div>
				</div>
			</div>
				@else
				<div class="alert alert-warning" style="text-align: center;">
					Chưa có sản phẩm nào trong giỏ hàng. <strong><a href="{{route('customer.index')}}">Tiếp tục mua hàng</a></strong>
				</div>
				@endif

				<!-- end cart -->
			@endif
		</div>
	</div>
@endsection('content')

@section('script2')
	<script>

   	$(document).ready(function(){
   		var _up = $('.up');
   		var _down = $('.down');
   		var _total = $('.total');

   		

			$('.up').click(function (e) {
				var _parent = $(this).parent();
				var tongtien = parseInt($('#totalPrice').val());
				var quantity = parseInt($('#totalQuantity').val())+1;
				var gia = parseInt(_parent.data('gia'));

				var data_id = _parent.data('id');
				var this_total = parseInt(_parent.children('.total').text());
				this_total++;
				_parent.children('.total').text(this_total);

				tongtien +=  gia;
				$('#totalPrice').val(tongtien);
				$('#totalQuantity').val(quantity);

				var gan_soluong = $('#totalQuantity').val();
				$('#gan_soluong').html(gan_soluong);

				var gan_tongtien = $('#totalPrice').val();
				gan_tongtien = parseInt(gan_tongtien).toLocaleString('en-US');
				$('#gan_tongtien').html(gan_tongtien);

			});


			$('.down').click(function (e) {

				var _parent = $(this).parent();
				var tongtien = parseInt($('#totalPrice').val());
				var quantity = parseInt($('#totalQuantity').val());
				var gia = parseInt(_parent.data('gia'));

				var _total = parseInt(_parent.children('.total').text());
				if(_total>1){
					_parent.children('.total').text(_total-1);
					quantity--;
					tongtien = tongtien - gia;
					$('#totalPrice').val(tongtien);
					$('#totalQuantity').val(quantity);

					var gan_tongtien = $('#totalPrice').val();
					gan_tongtien = parseInt(gan_tongtien).toLocaleString('en-US');
					$('#gan_tongtien').html(gan_tongtien);

					var gan_soluong = $('#totalQuantity').val();
					$('#gan_soluong').html(gan_soluong);
				}
					
			});

			
   	

   	});
   </script>
@endsection('script2')
