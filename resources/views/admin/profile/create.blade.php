@extends('admin.layout.app')
@section('title','Thêm mới người dùng')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel panel-heading">Thêm mới người dùng</div>
			<div class="panel panel-body">
				@if(!$errors->isEmpty())
				<div class="alert alert-danger">
						<strong>Lỗi! </strong>{{$errors->first()}}
				</div>
				@endif
				<form action="{{route('admin.profile.store')}}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<label for="">Tên </label>
						<input type="text" value="{{old('name')}}" name="name" class="form-control">
					</div>
					
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" value="{{old('email')}}" name="email" class="form-control">
					</div>

					<div class="form-group">
						<label for="">Mật khẩu</label>
						<input type="password" value="{{old('password')}}" name="password" class="form-control">
					</div>


					<div class="form-group">
						<label for="">Nhập lại mật khẩu</label>
						<input type="password" value="{{old('password_confirmation')}}" name="password_confirmation" class="form-control">
					</div>

					<div class="form-group">
						<label for="">Quyền</label>
						<select name="permission" id="" style="padding:2px 7px;">
							<option value="admin">Admin</option>
							<option value="user">User</option>
						</select>
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