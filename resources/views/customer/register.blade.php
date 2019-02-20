@extends('customer.layout.app')
@section('title','Đăng ký')
@section('content')
	<style>
.login{

}
.login-form{
 border:1px solid #ddd;
 border-radius: 10px;
 width: 400px;
 background-color: whitesmoke;
 margin: 55px auto;
 padding: 20px;
}
i{
    font-size: 20px;
    padding-right: 10px;
}
</style>
<div class="container">
  <div class="login">

     <div class="login-form">
      @if(!$errors->isEmpty())
        <div class="alert alert-danger">
            <strong>Lỗi! </strong>{{$errors->first()}}
        </div>
        @endif
        <form action="{{ route('customer.get.register')}}" method="post">
           {{ csrf_field() }} 
           <div class="form-group">
               <label for="email">Email</label>
               <input type="text" name="email"  value="{{old('email')}}" class="form-control">
           </div>

           <div class="form-group">
               <label for="name">Họ và tên</label>
               <input type="text" name="name" value="{{old('name')}}" class="form-control">
           </div>

           <div class="form-group">
               <label for="phone">Số điện thoại</label>
               <input type="text" name="phone" value="{{old('phone')}}" class="form-control">
           </div>

           <div class="form-group">
               <label for="birthday">Ngày sinh</label>
               <input type="date" name="birthday" value="{{old('birthday')}}" class="form-control">
           </div>

           <div class="form-group">
               <label for="">Giới tính</label>
               <input type="radio" name="gender" value="1" checked> Name
               <input type="radio" name="gender" value="0"> Nữ<br>
           </div>

           <div class="form-group">
               <label for="">Địa chỉ</label>
               <input type="text" name="address" value="{{old('address')}}" class="form-control"> 
           </div>

           <div class="form-group">
             <label for="username">Mật khẩu</label>
             <input type="password" name="password" value="{{old('password')}}" class="form-control"> 
         </div>
         <div class="form-group">
             <label for="username">Nhập lại mật khẩu</label>
             <input type="password" name="password_confirmation" class="form-control">         
         </div>
         <input type="submit" class="btn btn-primary form-control" value="Đăng ký ngay">
        </form>
</div>
</div>
</div>
@endsection('content')