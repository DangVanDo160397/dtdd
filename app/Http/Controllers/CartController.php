<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Cart;
use Session;

class CartController extends Controller
{
    public function __constructor(){
        $this->middleware('Auth:customer');
    }

    public function index(){
    	return view('customer.cart');
    }

    public function getAddtoCart( Request $request,$id){
    	$product = Products::findOrFail($id);
    	$oldCart = Session('cart')?Session::get('cart'):null;
    	$cart = new Cart($oldCart);
    	$cart->addItem($product,$id);
    	$request->session()->put('cart',$cart);
    	return redirect()->back();
    }
    public function deleteCart($id){
    	$oldCart = Session::has('cart')?Session::get('cart'):null;
    	$cart = new Cart($oldCart);
    	$cart->removeItem($id);
    	if(count($cart->items)>0){
    		Session::put('cart',$cart);
    	}else{
    		Session::forget('cart');
    	}
    	return redirect()->back();
    }
}
