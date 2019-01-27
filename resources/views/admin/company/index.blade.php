@extends('admin.layout.app')
@section('title','Quản lý danh mục')
@section('content')
<div class="row">
	<div class="col-md-6">
		<div style="margin-bottom: 5px;">
			<a href="{{ route('admin.company.create')}}" class="btn btn-primary">Thêm mới</a>
		</div>
		<div class="panel panel-primary">
			<div class="panel panel-heading">Quản lý danh mục</div>
			<div class="panel panel-body">
				<table class="table table-striped table-bordered">
					<tr>
						<th>Tên</th>
						<th>Quản lý</th>
					</tr>
					@foreach($listCompany as $company)
					<tr>
						<td>{{$company->name}}</td>
						<td>
							<a href="{{route('admin.company.edit',$company->company_id)}}" class="">Sửa</a>&nbsp;&nbsp;
							<form action="{{route('admin.company.destroy',$company->company_id)}}" method="post">
								{{ csrf_field()}}
								{{method_field('DELETE')}}
								<input type="submit" value="Xóa" style="padding:1px 2px;">
							</form>
						</td>
					</tr>
					@endforeach
				</table>				
			</div>
		</div>
	</div>
</div>

@endsection