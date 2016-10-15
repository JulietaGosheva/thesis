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
}
