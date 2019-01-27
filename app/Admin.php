<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;

class Admin extends Authenticatable
{
    //
	protected $table = 'admins';
	// protected $guard = 'tbl_admin_users';
	protected $fillable = [
		'username', 'email', 'password','permission',
	];
	protected $hidden = [
		'password', 'remember_token',
	];
	
}
