<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
	
	protected $timestamps = false;

    protected $hidden = [
        'password',
    ];
}
