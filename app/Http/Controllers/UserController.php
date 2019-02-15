<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Company;
class UserController extends Controller
{
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
			}
			return back();
    }
    public function logout(){
    	Auth::guard('customer')->logout();
    	return redirect()->route('customer.index');
    }
}
