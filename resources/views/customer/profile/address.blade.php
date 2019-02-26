@extends('customer.layout.app')
@section('title','Địa chỉ')
@section('content')
	<div class="container" style="margin-top: 30px">
		<div class="row">
			<div class="col-md-3">
				<p>Hello, {{ $customer->name}}</p>
				<h4>Quản lý tài khoản</h4>
				<ul>
					<li><a href="{{ route('customer.profile.show',Auth::guard('customer')->user()->id) }}">Thông tin tài khoản</a></li>
					<li><a href="#">Địa chỉ mua hàng</a></li>
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
				<h3>Địa chỉ mua hàng</h3>
				<div class="row">
						<div class="col-md-4">
							<div class="form-group">
	               <label for="name">Tỉnh/Thành phố</label><br>
	               {{ csrf_field() }}
	               <select name="provinces" id="province" class="form-control">
	               	<option value="">--Lựa chọn--</option>
	               	@foreach($provinces as $province)
	               	<option value="{{ $province->province_id }}" id="provincee">{{ $province->name }}</option>
	               	@endforeach
	               </select>
	           </div>
							
							<div class="form-group">
	               <label for="name">Quận/Huyện</label><br>
	              	<div class="district">
	              		<select name="" id="" class="form-control">
	              			<option value="">--Lựa chọn--</option>
	              		</select>
	              	</div>
	           </div>

	           <div class="form-group">
	               <label for="name">Phường/Xã</label><br>
	               <div class="ward">
	              		<select name="" id="" class="form-control">
	              			<option value="">--Lựa chọn--</option>
	              		</select>
	              	</div>
	           </div>

	           <div class="form-group">
	               <form action="{{ route('customer.profile.update',Auth::guard('customer')->user()->id) }}" method="post" >
	               	{{csrf_field()}}
									{{method_field('PUT')}}
	               	<label for="name">Số nhà/ Đường</label><br>
	               	<input type="hidden" name="province" id="province_input" value="">
	               	<input type="hidden" name="district"  id="district_input" value="">
	               	<input type="hidden" name="ward" id="ward_input" value="">
	               	<input type="text" class="form-control" name="street" value="" placeholder="Nhập số nhà đường..."><br>
	               	<input type="submit" value="Lưu lại" class="btn btn-primary">
	               </form>
	           </div>
						</div>
				</div>
			</div>
		</div>
	</div>
@endsection('content')
@section('script2')
	<script>
		$(document).ready(function(){

				$('#province').click(function(){
						var province = $(this).val();
						var _token = $('input[name="_token"]').val();
						$.ajax({
							url: "{{ route('customer.post.address') }}",
							method: 'post',
							data: {province:province, _token:_token},
							success:function(data){	
								console.log(data);
								$('.district').html(data);
								district();
								load_address();
							}
						});
				});
				
				function district(){
					$('#district').click(function(){
							var district = $(this).val();
							var _token = $('input[name="_token"]').val();
							$.ajax({
								url: "{{ route('customer.post.district') }}",
								method: 'post',
								data: {district:district, _token:_token},
								success:function(data){	
									$('.ward').html(data);
									load_address();
								}
							});
					});
				}
				
				function load_address(){
					var province = $('#province option:selected').text();
					var district = $('#district option:selected').text();
					
					$('#ward').click(function(){
						var ward = $('#ward option:selected').text();
						$('#ward_input').val(ward);
					});

					$('#province_input').val(province);
					$('#district_input').val(district);
					
				}
		});
	</script>
@endsection('script2')