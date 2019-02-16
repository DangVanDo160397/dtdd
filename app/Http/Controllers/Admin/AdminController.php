<?php

namespace App\Http\Controllers\Admin;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Admin;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    // public function __construct(){
    // 	$this->middleware('auth:admin');
    // }

		public function logout(){
					Auth::logout();
					return redirect()->route('admin.get.login');	
		}

		public function index(){
			return view('admin.index');
		}

		public function error(){
			return view('admin.404');
		}
}
