@extends('admin.layout.app')
@section('data-title','Trang chủ | Admin')
@section('content')
<style>
	.col-md-3{
		box-sizing: border-box;
		padding: 10px;
	}
	.content{
		height: 100px;
	}
	.data-title{
		text-align: center;
		padding: 5px 0;
		font-weight: bold;
		color: white;
	}
</style>
  <div class="wrapper">
	
  	<div class="row">
  		<p class="data-title" style="color:black; font-size: 32px">Báo cáo thống kê</p>
  		<div class="col-md-3" >
  			<div class="content" style="background-color: #1BC98E">
  				<p class="data-title">Sản phẩm</p>
  			</div>
  		</div>
  		<div class="col-md-3" >
  			<div class="content" style="background-color: #E64759">
  				<p class="data-title">Tin tức</p>
  			</div>
  		</div>
  		<div class="col-md-3" >
  			<div class="content" style="background-color: #9F86FF">
  				<p class="data-title">Đơn đặt hàng</p>
  			</div>
  		</div>
  		<div class="col-md-3" >
  			<div class="content" style="background-color: #E4D836;">
  				<p class="data-title">Thành viên</p>
  			</div>
  		</div>
  	</div>
  	<hr>
			<div class="row">
				<h1>Có 1 đơn hàng mới <a href="#">Xem ngay</a></h1>
			</div>
  </div>
@endsection('content')