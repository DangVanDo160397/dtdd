<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Customer extends Authenticatable
{
    protected $table = 'customers';
    protected $fillable = ['id','name','password','gender','address','phone','email','birthday','thumbnail'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function order(){
			return $this->hasMany(Order::class,'customer_id');
		}
}
