@extends('admin.layout.app')
@section('title','Tin tức | Admin')
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
			<a href="{{ route('admin.new.create')}}" class="btn btn-primary">Thêm mới</a>
		</div>
		@if(session('error'))
		<div class="alert alert-danger">
			<strong>OK! </strong> {{ session('error')}}
		</div>
		@endif
		<div class="panel panel-primary">
			<div class="panel panel-heading">Quản lý tin tức</div>
			<div class="panel panel-body">
				<table class="table table-striped table-bordered">
						<tr>
							<th>STT</th>
							<th>Ảnh đại diện</th>
							<th>Tên</th>
							<th>Nội dung</th>
							<th>Người đăng</th>
							<th>Quản lý</th>
						</tr>
					<?php 
					$stt = 0;
					foreach($listNews as $new){
						?>
						<tr>
							<td><?php echo ++$stt ?></td>
							<td>
								<div class="image" style="width: 150px;height: auto">
									<img src="{{asset($new->thumbnail)}}" alt="" style="width: 100%;">
								</div>
							</td>
							<td>{{$new->title}}</td>
							<td>{{$new->description}}</td>
							<td>{{$new->author}}</td>
							<td>
								<a href="{{route('admin.new.edit',$new->new_id)}}" class="btn btn-primary">Sửa</a>&nbsp;&nbsp;
								<form action="{{route('admin.new.destroy',$new->new_id)}}" method="post">
									{{ csrf_field()}}
									{{method_field('DELETE')}}
									<input type="submit" class="btn btn-danger" value="Xóa">
								</form>
							</td>
						</tr>
					<?php } ?>
				</tbody>
					<div class="row">
						<div class="col-md-6">
							
								<!-- {{ $listNews->links() }} -->
								{{ $listNews->appends(request()->except('page'))->links()}}
						</div>
						<div class="col-md-6" style="margin-top: 15px">
							<form action="{{route('admin.new.search')}}" method="post">
							{{ csrf_field()}}
								<div class="row">
									<div class="col-md-9">
										<input type="text" class="form-control" name="key" placeholder="Nhập tên cần tìm kiếm">
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