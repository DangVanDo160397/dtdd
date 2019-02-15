@extends('admin.layout.app')
@section('title','Quản lý người dùng')
@section('content')
<style>
	.row .table>tbody>tr>th{
		background-color: #37474f;
		color: white;
		vertical-align: inherit;
		text-align: center;
	}
	.row .table>tbody>tr>td{
		text-align: center;
		vertical-align: inherit;
	}
	tbody>tr>td>a{
		margin-left: 10px;
	}
</style>
<div class="row">
	<div class="col-md-12">
		<div style="margin-bottom: 5px;">
			<a href="{{ route('admin.profile.create')}}" class="btn btn-primary">Thêm mới</a>
		</div>
		@if(session('alert'))
		<div class="alert alert-info">
			<strong>OK! </strong> {{ session('alert')}}
		</div>
		@endif
		<div class="panel panel-primary">
			<div class="panel panel-heading">Quản lý Người dùng</div>
			<div class="panel panel-body">

				<table class="table table-striped table-bordered">
					<tr>
						<th>Stt</th>
						<th>Tên</th>
						<th>Email</th>
						<th>Quyền</th>
						<th>Quản lý</th>
					</tr>
					<?php 
					$stt = 0;
					foreach($list_profiles as $profile){
						?>
						<tr>
							<td><?php echo ++$stt ?></td>
							<td>{{ $profile->name}}</td>
							<td>{{$profile->email}}</td>
							<td>{{$profile->permission}}</td>
							<td>
								<a href="{{route('admin.profile.edit',$profile->id)}}" style="margin-bottom: 10px;" class=" btn btn-primary">Sửa</a>&nbsp;&nbsp;
								<form action="{{route('admin.profile.destroy',$profile->id)}}" method="post">
									{{ csrf_field()}}
									{{method_field('DELETE')}}
									<input type="submit" value="Xóa" class="btn btn-danger">
								</form>
							</td>
						</tr>
					<?php } ?>
				</table>				
			</div>
		</div>
	</div>
</div>
@endsection('content')