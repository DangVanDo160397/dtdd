<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['id','order_code','order_detail','order_date','customer_id','product_id','count','total','status'];
    public function customer(){
    	return $this->belongsTo(Customer::class,'customer_id','id');
    }
    public function product(){
    	return $this->belongsTo(Products::class,'product_id','product_id');
    }
}
