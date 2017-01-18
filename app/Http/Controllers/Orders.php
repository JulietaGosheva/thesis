<?php
namespace App\Http\Controllers;

use Log;
use Auth;
use Validator;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\DB;

use App\Orders as Order;
use App\Http\Controllers\Controller;

class Orders extends Controller {
	
	public function createOrder(Request $request, Response $response) {
		$data = $request->all();
		
		$validator = Validator::make($data, [
			'ids' => 'required',
			'address' => 'required|min:1',
		]);
	
		if ($validator->fails()) {
			return view('cart.review', ['errors' => $validator->errors()->all()]);
		}
	
		$user = $request->session()->get('user');
		
		$ids = implode(',', $data['ids']);
		
		$order = Order::create([
			'user_id' => $user->id,
			'order_date' => date('mm:dd:YY'),
			'address' => $data['address'],
			'dish_ids' => $ids
		]);

		if ($order === null) {
			return view('cart.review', ['errors' => ['Failed to create an order.']]);
		}
		
		$session = $request->session();
		$session->remove("orders");
		
		return redirect()->to('/cart');
	}
	
	public function listOrders(Request $request, Response $response) {
		return view('orders.review', ["orders" => Order::all()]);
	}
}