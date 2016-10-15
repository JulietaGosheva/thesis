<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model {

	public $timestamps = false;
	
	public $fillable = [
		'user_id', 'order_date', 'dish_ids', 'address'
	];
}
