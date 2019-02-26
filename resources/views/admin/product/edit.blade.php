@extends('admin.layout.app')
@section('title','Sửa sản phẩm')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel panel-heading">Thêm mới sản phẩm</div>
			<div class="panel panel-body">
				@if(!$errors->isEmpty())
				<div class="alert alert-danger">
						<strong>Lỗi! </strong>{{$errors->first()}}
				</div>
				@endif
				<form action="{{route('admin.product.update',$list_product->product_id)}}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					{{method_field('PUT')}}
					<input type="hidden" value="{{$list_product->product_id}}" name="id" class="form-control">
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">	
								<label for="">Tên sản phẩm</label>
								<input type="text" value="{{$list_product->name}}" name="name" class="form-control">
							</div>
							<div class="col-md-6">
								<label for="">Giá</label>
								<input type="text" value="{{$list_product->price}}" name="price" class="form-control">
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label for="">Kích thước màn hình</label>
								<input type="text" value="{{$list_product->screen_size}}" name="screen_size" class="form-control">
							</div>
							<div class="col-md-6">
								<label for="">Hệ điều hành</label>
								<input type="text" value="{{$list_product->operating_system}}" name="operating_system" class="form-control">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
						<div class="col-md-6">
						<label for="">Chíp xử lý (CPU)</label>
						<input type="text" value="{{$list_product->cpu}}" name="cpu" class="form-control">
					</div>

					<div class="col-md-6">
						<label for="">Ram</label>
						<input type="text" value="{{$list_product->ram}}" name="ram" class="form-control">
					</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">

								<label for="">Camera</label>
								<input type="text" value="{{$list_product->camera}}" name="camera" class="form-control">
							</div>

							<div class="col-md-6">
								<label for="">Bộ nhớ</label>
								<input type="text" value="{{$list_product->memories}}" name="memories" class="form-control">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label for="">Pin</label>
								<input type="text" value="{{$list_product->pin}}" name="pin" class="form-control">
							</div>

							<div class="col-md-6">
								<label for="">Hãng</label>
								<select name="cat_id" id="" calss="form-control" style="padding: 2px 7px;width: 100%;width: 100%;margin-top: 5px; margin-bottom: 15px;font-size: 14px;height: 34px;line-height: 1.42857143;    border: 1px solid #ccc;border-radius: 5px;">	
									@foreach($company as $com)
										@if($com->company_id == $cat->company_id)
											<option value="{{$com->company_id}}" selected>{{$com->name}}</option>
										@else
											<option value="{{$com->company_id}}">{{$com->name}}</option>
										@endif
									@endforeach
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="status">Sản phẩm hot
							@if($list_product->status == 1)
                <input name="status" type="checkbox" checked value="1">
							@else
								<input name="status" type="checkbox"  value="1">
							@endif
            </label>
					</div>

					<div class="form-group">
						<label for="">Ảnh đại diện</label>
						<div class="image" style="width: 150px;height: auto; border: 1px solid #ccc; margin: 10px 0;">
								<img src="{{asset($list_product->thumbnail)}}" alt="" style="width: 100%;">
						</div>
						<input type="file" value="" name="thumbnail" class="">
					</div>
					<div class="form-group">
						<input type="submit" value="Sửa" name="" class="btn btn-primary">
					</div>
				</form>	
			</div>
		</div>
	</div>
</div>

@endsection