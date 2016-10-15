<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersToRoles extends Model {
	
	public $timestamps = false;
	public $table = "users_to_roles";

	public $fillable = [
		'user_id', 'order_id'
	];
}
