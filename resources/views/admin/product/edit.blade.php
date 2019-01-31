@extends('admin.layout.app')
@section('title','Thêm mới tin tức')
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
					<div class="form-group">
						<label for="">Tên tin tức</label>
						<input type="text" value="{{$list_product->title}}" name="title" class="form-control">
					</div>
					
					<div class="form-group">
						<label for="">Mô tả ngắn</label>
						<input type="text" value="{{$list_product->description}}" name="description" class="form-control">
					</div>

					<div class="form-group">
						<label for="">Nội dung</label>
						<textarea name="content" id="" cols="30" rows="10"  class="form-control">{{$list_product->content}}</textarea>
					</div>

					<div class="form-group">
						<label for="">Ảnh đại diện</label>
						<div class="image" style="width: 150px;height: auto; border: 1px solid rgba(0,0,0,0.5); margin: 10px 0;">
								<img src="{{asset($list_product->thumbnail)}}" alt="" style="width: 100%;">
						</div>
						<input type="file" value="" name="thumbnail" class="">
					</div>

					<div class="form-group">
						<input type="submit" value="Sửa" name="name" class="btn btn-primary">
					</div>
				</form>	
			</div>
		</div>
	</div>
</div>

@endsection