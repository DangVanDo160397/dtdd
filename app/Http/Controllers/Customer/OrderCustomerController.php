<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Order;
use App\Products;
use OrderDetail;
use Auth;
class OrderCustomerController extends Controller
{
		public function orderCart(Request $request){
				if(Session::has('cart')){
					date_default_timezone_set('asia/ho_chi_minh');
					$cart = Session('cart');
					$order_detail = json_encode( $cart->items );
					$order = [
						'order_code' => str_random(10),
						'order_detail' => $order_detail,

						'order_date' => date("Y/m/d H:i"),
						'customer_id' => Auth::guard('customer')->user()->id,
						'count' => $cart->totalQuantity,
						'total' => $cart->totalPrice,
						'status' => 1
					];
					Order::create($order);
					return redirect()->route('customer.cart')
					->with("alert",$order['order_code']);
				}
		}

		public function orderCart_get(){
			return view('customer.order'); 
		}

		public function orderProduct(Request $request){

			$product_detail = Products::findOrFail($request->product_id);
			$info[$request->product_id] = [
				'qty' => $request->totalQty,
				'price' => $request->totalPrice,
				'item' => $product_detail,
			];
			date_default_timezone_set('asia/ho_chi_minh');
					$order = [
						'order_code' => str_random(10),
						'order_detail' => json_encode( $info ),
						'order_date' => date("Y/m/d H:i"),
						'customer_id' => Auth::guard('customer')->user()->id,
						'count' => $request->totalQty,
						'total' => $request->totalPrice,
						'status' => 1
					];
					Order::create($order);
					return redirect()->route('customer.cart')
					->with("alert",$order['order_code']);
		}
}
