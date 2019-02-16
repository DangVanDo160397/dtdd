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
		<div style="margin-bottom: 5px;">
			<a href="{{ route('admin.order.create')}}" class="btn btn-primary">Thêm mới</a>
		</div>
		@if(session('alert'))
		<div class="alert alert-danger">
			<strong>OK! </strong> {{ session('alert')}}
		</div>
		@endif
		<div class="panel panel-primary">
			<div class="panel panel-heading">Quản lý đơn hàng</div>
			<div class="panel panel-body">
				<table class="table table-striped table-bordered">
						<tr>
							<th>STT</th>
							<th>Mã đơn hàng</th>
							<th>Người mua</th>
							<th>Ngày đặt</th>
							<th>Số lượng</th>
							<th>Tổng tiền</th>
							<th>Trạng thái</th>
							<th></th>
							<th>Quản lý</th>
						</tr>
					<?php 
					$stt = 0;
					foreach($list_orders as $order){
						if($order->status==1){
						?>
						<tr>
							<td><?php echo ++$stt ?></td>
							<td><strong>{{$order->order_code}}</strong></td>
							<td>{{$order->customer->name}}</td>
							<td>{{date('d-m-Y', strtotime($order->order_date))}}</td>
							<td>{{$order->count}}</td>
							<td>{{number_format($order->total)}} đ</td>
							@if($order->status==1)
								<td style="color:red">Chưa nhận</td>
							@else
								<td style="color:green">Đã nhận</td>
							@endif
							<td><a href="{{route('admin.order.show',$order->id)}}">Chi tiết</a></td>
							<td>
								<form action="{{route('admin.order.update',$order->id)}}" method="post" style="margin-bottom:5px">
									{{csrf_field()}}
									{{method_field('PUT')}}
									<input type="submit" class="btn btn-primary" value="Nhận đơn">
								</form>
								
								<form action="{{route('admin.order.destroy',$order->id)}}" method="post">
									{{ csrf_field()}}
									{{method_field('DELETE')}}
									<input type="submit" style="width: 87px;" class="btn btn-danger" onclick="window.confirm('Bạn có chắc chắn muốn hủy?')" value="Hủy đơn">
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