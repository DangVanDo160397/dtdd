@extends('admin.layout.app')
@section('title','Thêm mới tin tức')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel panel-heading">Thêm mới tin tức</div>
			<div class="panel panel-body">
				@if(!$errors->isEmpty())
				<div class="alert alert-danger">
						<strong>Lỗi! </strong>{{$errors->first()}}
				</div>
				@endif
				<form action="{{route('admin.new.store')}}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<label for="">Tên tin tức</label>
						<input type="text" value="" name="title" class="form-control">
					</div>
					
					<div class="form-group">
						<label for="">Mô tả ngắn</label>
						<input type="text" value="" name="description" class="form-control">
					</div>

					<div class="form-group">
						<label for="">Nội dung</label>
						<textarea name="content" id="" cols="30" rows="10"  class="form-control"></textarea>
					</div>

					<div class="form-group">
						<label for="">Ảnh đại diện</label>
						<input type="file" value="" name="thumbnail" class="">
					</div>

					<div class="form-group">
						<input type="reset" value="Nhập lại" name="name" class="btn btn-danger">
						<input type="submit" value="Thêm mới" name="name" class="btn btn-primary">
					</div>
				</form>	
			</div>
		</div>
	</div>
</div>

@endsection