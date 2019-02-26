@extends('customer.layout.app')
@section('title','Profile')
@section('content')
	<div class="container" style="margin-top: 30px">
		<div class="row">
			<div class="col-md-3">
				<p>Hello, {{ $customer->name}}</p>
				<h4>Quản lý tài khoản</h4>
				<ul>
					<li><a href="{{ route('customer.profile.show',Auth::guard('customer')->user()->id) }}">Thông tin tài khoản</a></li>
					<li><a href="{{ route('customer.get.address') }}">Địa chỉ mua hàng</a></li>
					<li><a href="#">Hình thức thanh toán</a></li>
				</ul>
				<h4>Quản lý đơn hàng</h4>
				<ul>
					<li><a href="#">Đơn hàng đã đặt</a></li>
					<li><a href="#">Đơn hàng đang đặt</a></li>
				</ul>
				<h4><a href="{{route('customer.cart')}}">Giỏ hàng</a></h4>
			</div>
			<div class="col-md-9">
				@if(session('alert'))
				<div class="alert alert-danger" style="margin-top: 40px;">
					<strong>OK! </strong> {{ session('alert')}}
				</div>
				@endif
				<h3>Thông tin tài khoản</h3>

				<div class="form-group">
					<div class="row">
						<div class="col-md-6"><strong>Tên</strong></div>
						<div class="col-md-6"><strong>Giới tính</strong></div>
					</div>
					<div class="row">
						<div class="col-md-6"><input type="text" id="screen" value="{{$customer->name}}" disabled class="form-control"></div>
						<div class="col-md-6"><input type="text" id="OP" value="{{$customer->gender==1?'Nam':'Nữ'}}" disabled class="form-control"></div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md-6"><strong>Số điện thoại</strong></div>
						<div class="col-md-6"><strong>Email</strong></div>
					</div>
					<div class="row">
						<div class="col-md-6"><input type="text" id="screen" value="{{$customer->phone}}" disabled class="form-control"></div>
						<div class="col-md-6"><input type="text" id="OP" value="{{$customer->email}}" disabled class="form-control"></div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md-6"><strong>Ngày sinh</strong></div>
						<div class="col-md-6"><strong>Địa chỉ</strong></div>
					</div>
					<div class="row">
						<div class="col-md-6"><input type="text" id="screen" value="{{date('d-m-Y',strtotime($customer->birthday))}}" disabled class="form-control"></div>
						<div class="col-md-6"><input type="text" id="OP" value="{{$customer->address}}" disabled class="form-control"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection('content')