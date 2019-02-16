@extends('admin.layout.app')
@section('title','Đơn hàng | Admin')
@section('content')
<style>
	.table>tbody>tr>th{
		background-color: #37474f;
		color: white;
		vertical-align: inherit;
		text-align: center;
	}
</style>
	<div class="panel panel-primary">
		<div class="panel-heading">Chi tiết đơn hàng</div>
		<div class="panel-body">
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<label for="">Người gửi: </label> <span>{{$order->customer->name}}</span>
						</div>
						<div class="col-md-6">
							<label for="">Địa chỉ: </label> <span>{{$order->customer->address}}</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<label for="">Email: </label> <span>{{$order->customer->email}}</span>
						</div>
						<div class="col-md-6">
							<label for="">Số điện thoại: </label> <span>{{$order->customer->phone}}</span>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<label for="">Mã đơn hàng: </label> <span>{{$order->order_code}}</span>
						</div>
						<div class="col-md-6">
							<label for="">Ngày gửi: </label> <span>{{date('d-m-Y', strtotime($order->order_date))}}</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<table class="table table-striped table-bordered">
						<tr>
							<th>Stt</th>
							<th>Ảnh</th>
							<th>Mã Sản phẩm</th>
							<th>Tên Sản phẩm</th>
							<th>Số lượng</th>
							<th>Đơn giá</th>
						</tr>
						<?php 
							$order_detail = json_decode( $order->order_detail, true );
							$count = 0;
						 ?>
						 @foreach($order_detail as $key=>$value)
						<tr>
							<td>{{++$count}}</td>
							<td>
								<div class="img" style="width: 100px">
									<img  style="width:100%" src="{{asset('storage/'.$value['item']['thumbnail'])}}" alt="">
								</div>
							</td>
							<td>{{$key}}</td>
							<td>{{$value['item']['name']}}</td>
							<td>{{$value['qty']}}</td>
							<td>{{number_format($value['price'])}} đ</td>
						</tr>
						@endforeach
					</table>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<label for="">Số sản phẩm: </label> <span><strong>{{$order->count}}</strong></span>
						</div>
						<div class="col-md-6">
							<label for="">Tổng tiền: </label> <span><strong>{{number_format($order->total)}} đ</strong></span>
						</div>
					</div>
				</div>
				<a href="{{route('admin.order.index')}}">Quay lại đơn hàng</a>
		</div>
	</div>
@endsection('content')
