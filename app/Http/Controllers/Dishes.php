<?php
namespace App\Http\Controllers;

use Validator;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Dishes as Dish;
use App\Http\Controllers\Controller;

class Dishes extends Controller {
	
	public function loadDishView(Request $request, Response $response) {
		return view('dishesh.review', ['dishes' => Dish::all()]);
	}
	
	public function createDish(Request $request, Response $response) {
		$data = $request->all();
		$validator = Validator::make($data, [
			"name" => "required|min:1",
			"weight" => "required|numeric",
			"image_name" => "required",
			"price" => "required|numeric",
			"type" => "required"
		]);
		
		if ($validator->fails()) {
			return view('dishes.review', ['errors' => $validator->errors()->all()]);
		}
		
		$dish = Dish::create([
			"name" => $data['name'],
			"weight" => $data['weight'],
			"description" => $data['description'] == null ? "" : $data['description'],
			"image_name" => $data['image_name'],
			"price" => $data['price'],
			"type" => $data['type']
		]);
		
		if ($dish === null) {
			return view('dishes.review', ['errors' => ['Failed to create dish.']]);
		}
		
		return view('dishes.review', ['success' => 'Successfully created dish.']);
	}

	public function editDish(Request $request, Response $response) {
		$data = $request->all();
		$validator = Validator::make($data, [
			"id" => "required|numeric",
			"name" => "required|min:1",
			"weight" => "required|numeric",
			"image_name" => "required",
			"price" => "required|numeric",
			"type" => "required"
		]);
		
		if ($validator->fails()) {
			return view('dishes.edit', ['errors' => $validator->errors()->all()]);
		}
		
		$queryResult = Dish::where("id", $data['id'])->update([
			"name" => $data['name'],
			"weight" => $data['weight'],
			"description" => $data['description'] == null ? "" : $data['description'],
			"image_name" => $data['image_name'],
			"price" => $data['price'],
			"type" => $data['type']
		]);
		
		if ($queryResult > 0) {
			return view('dishes.edit', ['errors' => ['Failed to update user.']]);
		}
		
		return view('dishes.edit', ['success' => 'Successfully updated user.']);
	}
	
	public function deleteDishById(Request $request, Response $response) {
		$data = $request->all();
		
		$validator = Validator::make($data, [
				"id" => "required|numeric"
		]);
		
		if ($validator->fails()) {
			return view('dishes.delete', ['errors' => $validator->errors()->all()]);
		}
		
		$dish = $this->findDishById($data['id']);
		
		if ($dish === null) {
			return view('dishes.delete', ['errors' => ['Failed to find the dish.']]);
		}
		
		$deletedRows = $dish->delete();
		
		if ($deletedRows === 0) {
			return view('dishes.delete', ['errors' => ['Failed to delete dish.']]);
		}
		
		return view('dishes.delete', ['success' => 'Successfully deleted dish.']);
	}
	
	private function findDishById($id) {
		return Dish::find($id);
	}
}