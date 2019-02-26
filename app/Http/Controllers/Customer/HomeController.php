<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Products;
use App\Company;
use App\News;
use Auth;
use Str;
class HomeController extends Controller
{
    //
	public function index(Request $request){
		$check = Auth::guard('customer')->user();
		$cate_list = Company::all();
		$product_top_hot = Products::where('status',1)->limit(3)->get();
		$product_top_date = Products::orderBy('created_at','DESC')->limit(3)->get();
		$product_random = Products::inRandomOrder()->limit(3)->get();
		$list_news = News::orderBy('created_at','DESC')->limit(3)->get();
		
		return view('customer.index',compact('cate_list','check','product_top_hot','product_top_date','product_random','list_news'));
	}
	public function get_product($slug){
		$product = Products::where('slug',$slug)->first();
		return view('customer.single',compact('product'));
	}
	public function get_category($category){
		$cate_list = Company::where('slug',$category)->get();
		$list_product = Products::where('cat_id',$cate_list[0]->company_id)->paginate(12);	
		return view('customer.archive',compact('cate_list','list_product'));
	}

	public function get_top_view(){
		$product_top_view = Products::where('status',1)->limit(3)->get();
		return view('customer.index.');
	}

	public function error(){
		return view('customer.404');
	}

	public function search(Request $request){

		if($request->ajax()){
			
			$query = $request->get('key');
			$list_product = Products::where('name','LIKE','%'.$query.'%')->limit(5)->get();
			if(count($list_product)>0){
				$data = '<ul class="dropdown-menu" style="display:block; position:absolute">';
				foreach($list_product as $product){


					$data .= "<li><a href='".url('product/'.$product->slug)."'>";
					$data .= '<img src=" ';
					$data .= url('storage/'.$product->thumbnail). '" />';
					$data .= "<p>".$product->name."</p>";
					$data .= "<span>".number_format($product->price)." đ</span>";
					$data .= "</li><a/>";
				}
				$data .= '</ul>';
				echo $data;
			}
		}
		
	}
}
