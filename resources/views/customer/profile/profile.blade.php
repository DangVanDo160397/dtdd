@extends('customer.layout.app')
@section('title','Profile')
@section('content')
	<div class="container" style="margin-top: 30px">
		<div class="row">
			<div class="col-md-3">
				<p>Hello, {{ $customer->name}}</p>
				<h4>Quản lý tài khoản</h4>
				<ul>
					<li><a href="">Thông tin tài khoản</a></li>
					<li><a href="">Địa chỉ mua hàng</a></li>
					<li><a href="">Hình thức thanh toán</a></li>
				</ul>
				<h4>Quản lý đơn hàng</h4>
				<ul>
					<li><a href="">Đơn hàng đã đặt</a></li>
					<li><a href="">Đơn hàng đang đặt</a></li>
				</ul>
				<h4><a href="{{route('customer.cart')}}">Giỏ hàng</a></h4>
			</div>
			<div class="col-md-9">
				<h3>Thông tin tài khoản</h3>
				<table class="table table-bordered table-striped">
					<tr>
						<th>Mã đơn hàng</th>
						<th>Ngày đặt</th>
						<th>Số lượng</th>
						<th>Tổng tiền</th>
						<th>Tình trạng</th>
						<th>Quản lý</th>
					</tr>
					@foreach($customer->order as $order)
					<tr>
						<td><strong>{{$order->order_code}}</strong></td>
						<td>{{date('H:i, d-m-Y', strtotime($order->order_date))}}</td>
						<td>{{$order->count}}</td>
						<td>{{number_format($order->total)}} đ</td>
						<td>
							@if($order->status == 1)
								<span style="color:red">Chưa nhận</span>
							@else
								<span style="color:green">Đã nhận</span>
							@endif
						</td>
						<td><a href="#">Chi tiết đơn hàng</a></td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
@endsection('content')