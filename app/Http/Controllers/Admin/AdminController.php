<?php

namespace App\Http\Controllers\Admin;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Admin;
use App\Order;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    // public function __construct(){
    // 	$this->middleware('guest:admin');
    // }

		public function logout(){
					Auth::logout();
					return redirect()->route('admin.get.login');	
		}

		public function index(){
			$list_order = Order::orderBy('created_at','DESC')->limit(5)->get();
			return view('admin.index',compact('list_order'));
		}

		public function error(){
			return view('admin.404');
		}
}
