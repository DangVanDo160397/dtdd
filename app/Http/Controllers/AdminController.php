<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Admin;
class AdminController extends Controller
{
    
    public function getLogin(){
    	if(Auth::check()){
    		return redirect()->route('admin.get.index');;
    	}
			return view('admin.login');
		}
		// public function postLogin(Request $request){
		// 	echo $request->remember;
		// 	$email = $request->email;
		// 	$password = $request->password;
		// 	$remember = isset($request->remember) ? 1:0;
		// 	if(Auth::guard('admin')->attempt(['email' => $email, 'password' => $password],$remember)){
		// 		return redirect()->route('admin.get.index');
		// 	}
		// 	return back();
		// }
		
		public function postLogin(Request $request){
			echo $request->remember;
			$email = $request->email;
			$password = $request->password;
			$remember = isset($request->remember) ? 1:0;
			if(Auth::attempt(['email' => $email, 'password' => $password],$remember)){
				return redirect()->route('admin.get.index');
			}
			return back();
		}

		public function logout(){
					Auth::logout();
					return redirect()->route('admin.get.login');	
		}

		public function index(){
			return view('admin.index');
		}

		public function profile(){
			$acc = Auth::user();
			return view('admin.layout.app',compact($acc));
		}
}
