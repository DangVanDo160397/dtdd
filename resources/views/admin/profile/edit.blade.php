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
				<form action="{{route('admin.profile.update',$list_profile->id)}}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					{{method_field('PUT')}}
					<div class="form-group">
						<label for="">Tên </label>
						<input type="text" value="{{$list_profile->name}}" name="name" class="form-control">
					</div>
					
					<div class="form-group">
						<label for="">Email </label>
						<input type="text" value="{{$list_profile->email}}" name="email" class="form-control">
					</div>

					<div class="form-group">
						<label for="">Mật khẩu </label>
						<input type="password" value="" name="password" class="form-control">
					</div>
					
					<div class="form-group">
						<label for="">Nhập lại mật khẩu</label>
						<input type="password" value="" name="password_confirmation" class="form-control">
					</div>

					<div class="form-group">
						<label for="">Quyền</label>
						<select name="permission" id="" style="padding:2px 7px;">
							<option value="{{ $list_profile->permission}}" selected>{{ $list_profile->permission}}</option>
							<option value="admin">admin</option>
							<option value="user">user</option>
						</select>
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