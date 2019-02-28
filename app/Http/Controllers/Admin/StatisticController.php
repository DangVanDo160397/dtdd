<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Products;
use App\Company;

class StatisticController extends Controller
{
    public function product(){
    	$count_product = Products::all();
    	dd(count($count_product));
    }
}
