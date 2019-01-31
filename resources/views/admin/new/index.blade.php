@extends('admin.layout.app')
@section('title','Tin tức | Admin')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div style="margin-bottom: 5px;">
			<a href="{{ route('admin.new.create')}}" class="btn btn-primary">Thêm mới</a>
		</div>
		<div class="panel panel-primary">
			<div class="panel panel-heading">Quản lý tin tức</div>
			<div class="panel panel-body">
				<table class="table table-striped table-bordered">
					<tr>
						<th>Stt</th>
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
								<a href="{{route('admin.new.edit',$new->new_id)}}" class="">Sửa</a>&nbsp;&nbsp;
								<form action="{{route('admin.new.destroy',$new->new_id)}}" method="post">
									{{ csrf_field()}}
									{{method_field('DELETE')}}
									<input type="submit" value="Xóa" style="padding:1px 2px;">
								</form>
							</td>
						</tr>
					<?php } ?>
					
				</table>		
				{{ $listNews->links()}}		
			</div>
		</div>
	</div>
</div>
@endsection('content')