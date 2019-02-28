<?php

namespace App\Http\Controllers\Admin;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Admin;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    // public function __construct(){
    // 	$this->middleware('guest:admin');
    // }
    
    public function getLogin(){
    	if(Auth::check()){
    		return redirect()->route('admin.get.index');;
    	}
    	return view('admin.login');
    }
		
		public function postLogin(Request $request){
			$email = $request->email;
			$password = $request->password;
			$remember = isset($request->remember) ? 1:0;
			if(Auth::attempt(['email' => $email, 'password' => $password],$remember)){
				return redirect()->route('admin.get.index');
			}
			return back();
		}

}
