@extends('admin.layout.app')
@section('title','Thêm mới danh mục')
@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-primary">
			<div class="panel panel-heading">Thêm mới</div>
			<div class="panel panel-body">
				<form action="{{route('admin.company.store')}}" method="post">
					{{csrf_field()}}
					<div class="form-group">
						<label for="">Tên danh mục</label>
						<input type="text" value="" name="name">
						<input type="submit" value="Thêm" class="btn btn-primary">
					</div>
				</form>	
			</div>
		</div>
	</div>
</div>

@endsection