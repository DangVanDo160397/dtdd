@extends('customer.layout.app')
@section('title','Giỏ hàng')
@section('content')
	@if(Session::has('cart'))
		<?php $cart = Session('cart');
			$list_product = $cart->items;
		?>
	@endif
	<div class="container" style="margin-top: 30px;">
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
						<tr>
							<td>Tên</td>
							<td>Số lượng</td>
							<td>Đơn giá</td>
							<td></td>
						</tr>
						@foreach($list_product as $product)
						<tr>
							<td>{{$product['item']['name']}}</td>
							<td>{{$product['qty']}}</td>
							<td>{{number_format($product['price'])}}</td>
							<td><a href="{{route('customer.cart.delete',$product['item']['product_id'])}}"><i class="fas fa-trash-alt"></i></a></td>
						</tr>
						@endforeach
						
					</table>
				</div>
				<div class="col-md-3">
					<div class="h3">Chi tiết</div>
					<p>Số lượng sản phẩm: {{$cart->totalQuantity}}<span></span></p>
					<p>Tổng tiền: <span>{{number_format($cart->totalPrice)}} đ</span></p>
					<form action="{{route('customer.post.order')}}" method="post">
						{{ csrf_field()}}
						<input type="hidden" value="" name="cart">
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