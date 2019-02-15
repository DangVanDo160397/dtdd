@extends('customer.layout.app')
@section('title','Trang chủ')
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
        <form action="{{ route('customer.post.login')}}" method="post">
           {{ csrf_field() }} 
           <div class="form-group">
            <label for="username"><i class="fa fa-user" aria-hidden="true"></i>Email</label>
            <input type="text" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="username"><i class="fa fa-key" aria-hidden="true"></i>Mật khẩu</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group"> 
            <label class="remember">
                <input name="remember" type="checkbox" value="Remember Me">&nbsp;Remember Me
            </label>
        </div>
        <input type="submit" class="btn btn-primary form-control" value="Login">
    </form>
</div>
		</div>
	</div>
@endsection('content')