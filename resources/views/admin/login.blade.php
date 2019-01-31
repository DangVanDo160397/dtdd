<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <style>
    body{
        background-color: #CFCECE;
        background-image: url('{{asset('upload/login-bg.jpg')}}');
    }
    .container{

    }
    .login-form{
        border-radius: 10px;
        width: 400px;
        background-color: white;
        margin: 55px auto;
        padding: 20px;
    }
    i{
        font-size: 20px;
        padding-right: 10px;
    }
    .remember{
        cursor: pointer;
    }
</style>
<div id="container">
    <div class="login-form">
        <form action="{{ route('admin.post.login')}}" method="post">
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

</body>
</html>