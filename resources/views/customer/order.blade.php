@extends('customer.layout.app')
@section('title','Đặt hàng')
@section('content')
		<div class="container" >
			<div class="row">
				<div class="col-md-6" style="text-align: center;">
			
			@if(session('alert'))

			<div class="alert alert-danger" style="margin-top: 40px;">
				<strong>OK! </strong> {{ session('alert')}}
				<p><a href="{{route('customer.index')}}">Tiếp tục mua hàng?</a><a href="{{route('customer.index')}}">&nbsp;&nbsp;Quản lý đơn hàng</a></p>
			</div>


			@endif
			</div>
			</div>
		</div>
@endsection('content')