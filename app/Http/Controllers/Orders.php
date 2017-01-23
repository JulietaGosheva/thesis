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
			'quantities' => 'required',
			'address' => 'required|min:1',
		]);
	
		if ($validator->fails()) {
			return view('cart.review', ['errors' => $validator->errors()->all()]);
		}
	
		if (count($data['ids']) !== count($data['quantities'])) {
			return view('cart.review', ['errors' => ['Избраните ястия трябва да бъдат поръчани поне по веднъж']]);
		}
		
		$user = $request->session()->get('user');
		
		$orders = $this->implodeArrays($data['ids'], $data['quantities']);
		
		$order = Order::create([
			'user_id' => $user->id,
			'order_date' => date('mm:dd:YY'),
			'address' => $data['address'],
			'dish_ids' => $orders
		]);

		if ($order === null) {
			return view('cart.review', ['errors' => ['Failed to create an order.']]);
		}
		
		$session = $request->session();
		$session->remove("orders");
		
		return redirect()->to('/cart?ordering=success');
	}
	
	private function implodeArrays($ids, $quantities) {
		$implodeResult = "";
		
		for ($i = 0 ; $i < count($ids) ; $i++) {
			$implodeResult .= $ids[$i] . "{" . $quantities[$i] . "}";
			if ($i !== (count($ids) - 1)) {
				$implodeResult .= ",";
			}
		}
		
		return $implodeResult;
	}
	
	public function listOrders(Request $request, Response $response) {
		$orders = Order::with('user')->get();
		foreach ($orders as &$order) {
			$dishes = DB::table('dishes')->whereIn('id', $this->explodeIds($order->dish_ids));
			$order->dishes = $dishes;
		}
		return view('orders.review', ["orders" => $orders]);
	}
	
	// explode string with the following format:
	// <dish_id>{<order_count>},<dish_id2>{<order_count2>}
	// and return only dish_id`s in array
	private function explodeIds($rawDishIds) {
		$ids = array();
		$dishIds = explode(',', $rawDishIds);
		
		foreach ($dishIds as $dishId) {
			preg_match('/,?(\d+){\d+}/', $dishId, $matches);
			array_push($ids, $matches[1]);
		}

		return $ids;
	}
	
	public function markOrderAsProcessed(Request $request, Response $response, $id) {
		$queryResult = Order::where("id", $id)->update([
				"processed" => "true"
		]);
		
		if ($queryResult === 0) {
			return view('orders.review', ['errors' => ['Неуспешно отбелязване на поръчката като обработена.']]);
		}
		
		return view('orders.review', ['success' => 'Успешно отбелязване на поръчката като обработена.']);
		
	}
	
	public function markOrderAsNotProcessed(Request $request, Response $response, $id) {
		$queryResult = Order::where("id", $id)->update([
				"processed" => "false"
		]);
		
		if ($queryResult === 0) {
			return view('orders.review', ['errors' => ['Неуспешно отбелязване на поръчката като необработена.']]);
		}
		
		return view('orders.review', ['success' => 'Успешно отбелязване на поръчката като необработена.']);
	}
}