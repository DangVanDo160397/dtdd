@extends('admin.layout.app')
@section('title','Thêm mới sản phẩm')
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
				<form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">	
								<label for="">Tên sản phẩm</label>
								<input type="text" value="{{old('name')}}" name="name" class="form-control">
							</div>
							<div class="col-md-6">
								<label for="">Giá</label>
								<input type="text" value="{{old('price')}}" name="price" class="form-control">
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label for="">Kích thước màn hình</label>
								<input type="text" value="{{old('screen_size')}}" name="screen_size" class="form-control">
							</div>
							<div class="col-md-6">
								<label for="">Hệ điều hành</label>
								<input type="text" value="{{old('operating_system')}}" name="operating_system" class="form-control">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
						<div class="col-md-6">
						<label for="">Chíp xử lý (CPU)</label>
						<input type="text" value="{{old('cpu')}}" name="cpu" class="form-control">
					</div>

					<div class="col-md-6">
						<label for="">Ram</label>
						<input type="text" value="{{old('ram')}}" name="ram" class="form-control">
					</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">

								<label for="">Camera</label>
								<input type="text" value="{{old('camera')}}" name="camera" class="form-control">
							</div>

							<div class="col-md-6">
								<label for="">Bộ nhớ</label>
								<input type="text" value="{{old('memories')}}" name="memories" class="form-control">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label for="">Pin</label>
								<input type="text" value="{{old('pin')}}" name="pin" class="form-control">
							</div>

							<div class="col-md-6">
								<label for="">Hãng</label>
								<select name="cat_id" id="" calss="form-control" style="padding: 2px 7px;width: 100%;width: 100%;margin-top: 5px; margin-bottom: 15px;font-size: 14px;height: 34px;line-height: 1.42857143;    border: 1px solid #ccc;border-radius: 5px;">
									@foreach($company as $com)
									<option value="{{$com->company_id}}">{{$com->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="status">Sản phẩm hot
                <input name="status" type="checkbox" value="1">&nbsp;
            </label>
					</div>

					<div class="form-group">
						<label for="">Ảnh đại diện</label>
						<input type="file" value="" name="thumbnail" class="form-control">
					</div>

					<div class="form-group">
						<input type="reset" value="Nhập lại" name="" class="btn btn-danger">
						<input type="submit" value="Thêm mới" name="" class="btn btn-primary">
					</div>
				</form>	
			</div>
		</div>
	</div>
</div>

@endsection