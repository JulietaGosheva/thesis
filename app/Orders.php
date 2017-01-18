<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Orders extends Model {

	public $timestamps = false;
	
	public $fillable = [
		'user_id', 'order_date', 'dish_ids', 'address'
	];
	
	function user() {
		return $this->belongsTo('App\User', 'user_id', 'id');
	}
	
	function disheszz() {
		$dishes = DB::table('dishes')->whereIn('id', explode(',', $dish_ids));
		
		return new CustomRelation($dishes);
	}
	
}

class CustomRelation extends HasMany {
	
	private $results;
	
	function __construct($results) {
		$this->results = $results;
	}
	
	function getResults() {
		return $this->results;
	}
	
}