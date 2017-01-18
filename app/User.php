<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
	
	public $timestamps = false;

	public $fillable = [
		'email', 'password', 'firstname', 'lastname', 'phone'
	];
	
    public $hidden = [
        'password',
    ];
    
    public function roles() {
    	return $this->belongsToMany('App\Roles', 'users_to_roles', 'user_id', 'role_id');
    }
}
