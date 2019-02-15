@extends('admin.layout.app')
@section('title','Đơn hàng | Admin')
@section('content')
<style>
	.row .table>tbody>tr>th{
		background-color: #37474f;
		color: white;
		vertical-align: inherit;
		text-align: center;
	}
</style>
<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-primary">
			<div class="panel panel-heading">Quản lý đơn hàng</div>
			<div class="panel panel-body">
				<table class="table table-striped table-bordered">
						<tr>
							<th>STT</th>
							<th>Ảnh</th>
							<th>Mã đơn hàng</th>
							<th>Tên hàng</th>
							<th>Người mua</th>
							<th>Số lượng</th>
							<th>Thành tiền</th>
							<th>Trạng thái</th>
							<th>Quản lý</th>
						</tr>
					<?php 
					$stt = 0;
					foreach($list_orders as $order){
						if($order->status==0){
						?>
						<tr>
							<td><?php echo ++$stt ?></td>
							<td>
								<div class="image" style="width: 150px;height: auto">
									<img src="{{asset('storage/'.$order->product->thumbnail)}}" alt="" style="width: 100%;">
								</div>
							</td>
							<td>{{$order->order_code}}</td>
							<td>{{$order->product->name}}</td>
							<td>{{$order->customer->name}}</td>
							<td>{{$order->count}}</td>
							<td>{{$order->total}}</td>
							@if($order->status==1)
								<td style="color:red">Chưa nhận</td>
							@else
								<td style="color:green">Đã nhận</td>
							@endif
							<td>
								<form action="{{route('admin.order.update',$order->id)}}" method="post" style="margin-bottom:5px">
									
									<input type="submit" class="btn btn-primary" value="Chi tiết">
								</form>

							</td>
						</tr>
					<?php } } ?>
				</tbody>
					<div class="row">
						<div class="col-md-6">
							
								{{ $list_orders->links() }}
							
						</div>
						<div class="col-md-6" style="margin-top: 15px">
							<form action="{{route('admin.order.index')}}" method="get">
							<!-- {{ csrf_field()}} -->
								<div class="row">
									<div class="col-md-9">
										<input type="text" class="form-control" name="key" placeholder="Nhập mã đơn hàng cần tìm kiếm">
									</div>
									<div class="col-md-3" style="margin-top: 5px">
										<input type="submit" class="btn btn-primary" value="Tìm kiếm">
									</div>
								</div>
							</form>
						</div>
					</div>
				</table>		
			</div>
		</div>
	</div>
</div>
@endsection('content')