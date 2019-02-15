<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Order;
use OrderDetail;
class OrderCustomerController extends Controller
{
    public function orderCart(Request $request){
    	if(Session::has('cart')){
    		$cart = Session('cart');
 				//dd($cart);

    		$order_detail = $cart->items;
    		
    		$order_detail = json_encode( $order_detail );
    		$order_detail = json_decode( $order_detail, true );
    		dd($order_detail);
    		 // foreach ($order_detail as $key => $value) {
    		 // 	echo "<pre>";
    		 // 	print_r(time().'_'.$key);
    		 // 	echo '</pre>';
    		 // }

    		 }
    	}
}
