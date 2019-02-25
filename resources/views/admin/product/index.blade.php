@extends('admin.layout.app')
@section('title','Sản phẩm | Admin')
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
			<a href="{{ route('admin.product.create')}}" class="btn btn-primary">Thêm mới</a>
		</div>
		@if(session('error'))
		<div class="alert alert-danger">
			<strong>OK! </strong> {{ session('error')}}
		</div>
		@endif
		@if(session('alert'))
		<div class="alert alert-danger">
			<strong>OK! </strong> {{ session('alert')}}
		</div>
		@endif
		<div class="panel panel-primary">
			<div class="panel panel-heading">Quản lý sản phẩm</div>
			<div class="panel panel-body">
				<table class="table table-striped table-bordered">
					<tr>
						<th>Stt</th>
						<th>Ảnh</th>
						<th>Tên</th>
						<th>Hãng</th>
						<th>Giá</th>
						<th>Hot</th>
						<th>Thông tin chi tiết</th>
						<th>Quản lý</th>
					</tr>
					<?php 
					$stt = 0;
					foreach($list_products as $product){
						?>
						<input type="hidden" id="category" value="{{$product->category->name}}">
						<tr>
							<td><?php echo ++$stt ?></td>
							<td>
								<div class="image" style="width: 100px;height: auto">
									<img src="{{ asset('storage/'.$product->thumbnail)}}" alt="" style="width: 100%;">
								</div>
							</td>
							<td>{{$product->name}}</td>
							<td>{{$product->category->name}}</td>
							<td>{{$product->price}}</td>
							<td>@if($product->status == 1) <i class="fas fa-check"></i>@endif</td>
							<td>
								<a href="#" class="open-modal" data-toggle="modal" data-cat="{{$product->category->name}}" data-product ="{{ $product->toJson()}}" data-target="#myModal">Xem chi tiết</a>
								<!-- Modal -->
								<div class="modal fade" id="myModal" role="dialog">
									<div class="modal-dialog modal-lg">
										<!-- Modal content-->
										<div class="modal-content">
											<div class="modal-body">
												<div class="panel panel-primary">
													<div class="panel panel-heading">Chi tiết sản phẩm</div>
													<div class="panel panel-body">
														<div class="row">
															<div class="col-md-6">
																<div class="thumbnail">
																	<img src="{{asset('storage/'.$product->thumbnail)}}" id="thumbnail" alt="" style="width: 100%;">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<div class="row">
																		<div class="col-md-6"><strong>Tên</strong></div>
																		<div class="col-md-6"><strong>Giá</strong></div>
																	</div>
																	<div class="row">
																		<div class="col-md-6"><input type="text" id="name" value="" disabled class="form-control"></div>
																		<div class="col-md-6"><input type="text" id="price" value="" disabled class="form-control"></div>
																	</div>
																</div>

																<div class="form-group">
																	<div class="row">
																		<div class="col-md-6"><strong>Kích thước màn hình</strong></div>
																		<div class="col-md-6"><strong>Hệ điều hành</strong></div>
																	</div>
																	<div class="row">
																		<div class="col-md-6"><input type="text" id="screen" value="{{$product->screen_size}}" disabled class="form-control"></div>
																		<div class="col-md-6"><input type="text" id="OP" value="{{$product->operating_system}}" disabled class="form-control"></div>
																	</div>
																</div>

																<div class="form-group">
																	<div class="row">
																		<div class="col-md-6"><strong>CPU</strong></div>
																		<div class="col-md-6"><strong>RAM</strong></div>
																	</div>
																	<div class="row">
																		<div class="col-md-6"><input type="text" id="CPU" value="{{$product->cpu}}" disabled class="form-control"></div>
																		<div class="col-md-6"><input type="text" id="RAM" value="{{$product->ram}}" disabled class="form-control"></div>
																	</div>
																</div>

																<div class="form-group">
																	<div class="row">
																		<div class="col-md-6"><strong>Camera</strong></div>
																		<div class="col-md-6"><strong>Bộ nhớ</strong></div>
																	</div>
																	<div class="row">
																		<div class="col-md-6"><input type="text" id="Cam" value="{{$product->camera}}" disabled class="form-control"></div>
																		<div class="col-md-6"><input type="text" id="Mem" value="{{$product->memories}}" disabled class="form-control"></div>
																	</div>
																</div>

																<div class="form-group">
																	<div class="row">
																		<div class="col-md-6"><strong>Pin</strong></div>
																		<div class="col-md-6"><strong>Hãng</strong></div>
																	</div>
																	<div class="row">
																		<div class="col-md-6"><input type="text" id="Pin" value="{{$product->pin}}" disabled class="form-control"></div>
																		<div class="col-md-6"><input type="text" id="Company" value="{{$product->category->name}}" disabled class="form-control"></div>
																	</div>
																</div>
																<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
															</div>
															
														</div>

													</div>
												</div>
											</div>
											
										</div>

									</div>
							</td>
							<td>
								<a href="{{route('admin.product.edit',$product->product_id)}}" class="btn btn-primary" style="margin-bottom: 10px;">Sửa</a>&nbsp;&nbsp;
								<form action="{{route('admin.product.destroy',$product->product_id)}}" method="post">
									{{ csrf_field()}}
									{{method_field('DELETE')}}
									<input type="submit" value="Xóa" class="btn btn-danger" onclick="window.confirm('Bạn có chắc chắn muốn xóa?')">
								</form>
							</td>
						</tr>
					<?php } ?>
					<div class="row">
						<div class="col-md-6">
							{{ $list_products->links()}}

							<!-- {{ $list_products->appends(request()->except('page'))->links()}} -->
						</div>
						<div class="col-md-6" style="margin-top: 15px">
							<form role="search" action="{{route('admin.product.search')}}" method="get">
								<div class="row">
									<div class="col-md-9">
										<input type="text" name="key" class="form-control" value="" placeholder="Nhập tên sản phẩm cần tìm kiếm">
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
@section('script')
<script>
	
	$(document).ready(function(){
		$('.open-modal').click(function(){
			 	var product = $(this).data('product');
			 	var cat = $(this).data('cat');
			 	$('#name').val(product.name);
		 		$('#price').val(product.price.toLocaleString('de-DE')+" đ");
		 		$('#screen').val(product.screen_size+" px");
		 		$('#thumbnail').attr("src","{{asset('')}}"+"storage/"+product.thumbnail);
		 		$('#OP').val(product.operating_system);
		 		$('#CPU').val(product.cpu);
		 		$('#Mem').val(product.memories +"GB");
		 		$('#Pin').val(product.pin +"mAh");
		 		$('#Company').val(cat);
		});
	});
</script>
@endsection(script)