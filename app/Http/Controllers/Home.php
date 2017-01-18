<?php
namespace App\Http\Controllers;

use App\Dishes as Dish;
use App\Http\Controllers\Controller;

class Home extends Controller {
	
	public function loadView() {
		return view('home.index', ['dishes' => Dish::all() ? Dish::all()->slice(0, 6) : array()]);
	}
	
}