<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Products;
use App\Company;
use Auth;
class HomeController extends Controller
{
    //
	public function index(){
		$check = Auth::guard('customer')->user();
		$cate_list = Company::all();
		return view('customer.index',compact('cate_list','check'));
	}
	public function get_product($id){
		$product = Products::findOrFail($id);
		return view('customer.single',compact('product'));
	}
	public function get_category($category){
		$cate_list = Company::where('slug',$category)->get();
		$list_product = Products::where('cat_id',$cate_list[0]->company_id)->paginate(12);	
		return view('customer.archive',compact('cate_list','list_product'));
	}
	public function get_product_detail(){}
}
