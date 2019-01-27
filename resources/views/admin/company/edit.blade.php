@extends('admin.layout.app')
@section('title','Thêm mới danh mục')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel panel-heading">Sửa</div>
            <div class="panel panel-body">
                <form action="{{route('admin.company.update',$listCompany->company_id)}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="">Tên danh mục</label>
                        <input type="text" value="{{$listCompany->name}}" name="name">
                        <input type="submit" value="Thêm" class="btn btn-primary">
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>

@endsection