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
		if ($this->searchId($id, $orders) !== false) {
			return redirect()->to('/dishes/review?failed=true');
		}

		$dish = Dish::find($id);
		$session->push("orders", $dish);
		
		return redirect()->to('/dishes/review?success=true');
	}
	
	public function removeFromCart(Request $request, Response $response, $id) {
		$session = $request->session();
		if ($session->has("orders") === false) {
			return view('cart.review', ['orders' => []]);
		}
	
		$orders = $session->get("orders");
		if ($orders !== null && ($key = $this->searchId($id, $orders)) !== false) {
			array_splice($orders, $key, 1);

			$session->put("orders", $orders);

			return redirect()->to('/cart?deletion=success');
		}
		
		return view('cart.review', ["errors" => ['Елемента не беше намерен в количката.']]);
	}
	
	private function searchId($id, $orders) {
		for($i = 0; $i < count($orders); $i++) {
			$dish = $orders[$i];
			if($id == $dish->id) {
				return $i;
			}
		}
		return false;
	}
	
 }