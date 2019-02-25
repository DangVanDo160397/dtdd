@extends('admin.layout.app')
@section('title','Trang chủ | Admin')
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
  ul.thongke{
    margin:0px;
    padding: 0px;
  }
  ul.thongke>li{
    list-style: none;
    margin-left: 10px;
    line-height: 1.3;
  }
  ul.activity{
    margin-left: 30px;
  }
  ul.activity>li>p{
    font-size: 20px;
  }
</style>
  <div class="wrapper">
	
  	<div class="row">
  		<p class="data-title" style="color:#444444; font-size: 32px">Báo cáo thống kê</p>
  		<div class="col-md-3" >
  			<div class="content" style="background-color: #1BC98E">
  				<p class="data-title">Sản phẩm</p>
          <ul class="thongke">
            <li>- Tổng sản phẩm: 69</li>
            <li>- Đã bán: 9</li>
            <li>- Còn lại: 60</li>
          </ul>
  			</div>
  		</div>
  		<div class="col-md-3" >
  			<div class="content" style="background-color: #E64759">
  				<p class="data-title">Tin tức</p>
          <ul class="thongke">
            <li>- Tổng số bài viết: 69</li>
            <li>- Lượt xem: 9</li>
            <li>- Lượt bình luận: 60</li>
          </ul>
  			</div>
  		</div>
  		<div class="col-md-3" >
  			<div class="content" style="background-color: #9F86FF">
  				<p class="data-title">Đơn đặt hàng</p>
          <ul class="thongke">
            <li>- Tổng đơn: 69</li>
            <li>- Đã nhận: 60</li>
            <li>- Chưa nhận: 9</li>
          </ul>
  			</div>
  		</div>
  		<div class="col-md-3" >
  			<div class="content" style="background-color: #E4D836;">
  				<p class="data-title">Thành viên</p>
          <ul class="thongke">
            <li>- Tổng thành viên: 69</li>
            <li>- Khách hàng: 9</li>
            <li>- Ghé thăm: 60</li>
          </ul>
  			</div>
  		</div>
  	</div>
  	<hr>
			<div class="row">
        <p class="data-title" style="color:#444444; font-size: 32px">Hoạt động mới nhất</p>
        <ul class="activity">
          @foreach($list_order as $order)
          <li><p>[{{ date('H:i - d/m/Y',strtotime($order->order_date)) }}] Có một đơn hàng mới <a href="{{ route('admin.order.show',$order->id) }}">{{ $order->order_code }}</a></p></li>
          @endforeach
        </ul>
			</div>
  </div>
@endsection('content')