<?php
namespace App\Http\Controllers;

use Log;
use Validator;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\DB;

use App\Dishes as Dish;
use App\Http\Controllers\Controller;

class Cart extends Controller {
	
	public function loadCartView(Request $request, Response $response) {
		$session = $request->session();
		if ($session->has("orders") === false) {
			return view('cart.review', ['orders' => []]);
		}

		$orders = $session->get("orders");
		if ($orders === null) {
			return view('cart.review', ['orders' => []]);
		}
		
		return view('cart.review', ['orders' => $orders]);
	}
	
	public function addToCart(Request $request, Response $response, $id) {
		$session = $request->session();
		if ($session->has("orders") === false) {
			$session->put("orders", []);
		}
		
		$orders = $session->get("orders");
		if (array_search($id, $orders) !== false) {
			return redirect()->to('/dishes/review');
		}
		
		$session->push("orders", $id);
		
		return redirect()->to('/dishes/review');
	}
	
	public function removeFromCart(Request $request, Response $response, $id) {
		$session = $request->session();
		if ($session->has("orders") === false) {
			return view('cart.review', ['orders' => []]);
		}
		
		$orders = $session->get("orders");
		if ($orders !== null && ($key = array_search($id, $orders)) !== false) {
			array_splice($orders, $key, 1);
			
			$session->put("orders", $orders);

			return redirect()->to('/cart');
		}
		
		return view('cart.review', ["errors" => ['Element was not found in the cart.']]);
	}
	
}