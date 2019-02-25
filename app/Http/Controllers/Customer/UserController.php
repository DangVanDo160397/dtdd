<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Auth;
use App\Company;
use App\Customer;

class UserController extends Controller
{

    public function index(){
        return view('customer.profile.index');
    }

    public function getLogin(){
        if(Auth::guard('customer')->check()){
            return redirect()->route('customer.index');
        }
        return view('customer.login');
    }

    public function postLogin(Request $request){
    	   $email = $request->email;
			$password = $request->password;
			$remember = isset($request->remember) ? 1:0;
			if(Auth::guard('customer')->attempt(['email' => $email, 'password' => $password],$remember)){
				return redirect()->route('customer.index');
			}else{
                return back()->with('error', 'Sai tài khoản hoặc mật khẩu');
            }
			return back();
    }
    
    public function logout(){
    	Auth::guard('customer')->logout();
    	return redirect()->route('customer.index');
    }

    public function getRegister(){
        return view('customer.register');
    }

    public function postRegister(RegisterRequest $request){
        $request->merge(['password' => bcrypt($request->password),'thumbnail' => '123']);
        Customer::Create($request->all());
        return redirect()->route('customer.get.login')->with('alert','Đăng ký thành công');
    }
}
