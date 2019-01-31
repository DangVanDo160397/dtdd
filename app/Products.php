<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $fillable = ['name','price','screen_size','thumbnail','operating_system','cpu','ram','camera','memories','pin','status','cat_id'];
    public function category(){
    	  return $this->belongsTo(Company::class,'cat_id','company_id');
    }
}
