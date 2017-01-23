<?php
namespace App\Http\Controllers;

use Log;
use Validator;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\DB;

use App\Dishes as Dish;
use App\Http\Controllers\Controller;

class Dishes extends Controller {
	
	public function loadDishView(Request $request, Response $response) {
		return view('dishes.review', ['dishes' => Dish::all()]);
	}
	
	public function createDish(Request $request, Response $response) {
		$data = $request->all();
		$validator = Validator::make($data, [
			"name" => "required|min:1",
			"weight" => "required|numeric",
			"file" => "required",
			"price" => "required|numeric",
			"type" => "required"
		]);
		
		if ($validator->fails()) {
			return view('dishes.creation', ['errors' => $validator->errors()->all()]);
		}

		DB::beginTransaction();
		
		$file = $request->file("file");
		if ($file->isValid() === false) {
			DB::rollBack();
		
			return view('dishes.creation', ['errors' => ['Невалиден файл.']]);
		}
		
		$imageName = round(microtime(true) * 1000) . "." . $file->getClientOriginalExtension();
		
		try {
			$file->move(base_path('resources/assets/images'), $imageName);
		} catch (Exception $exception) {
			DB::rollBack();
			
			return view('dishes.creation', ['errors' => [$exception->getMessage()]]);
		}
		
		$dish = Dish::create([
			"name" => $data['name'],
			"weight" => $data['weight'],
			"description" => $data['description'] == null ? "" : $data['description'],
			"image_name" => $imageName,
			"price" => $data['price'],
			"type" => $data['type']
		]);
		
		if ($dish === null) {
			DB::rollBack();

			return view('dishes.creation', ['errors' => ['Неуспешно създаване на ястие.']]);
		}

		DB::commit();
		
		return view('dishes.creation', ['success' => 'Успешно създаване на ястие.']);
	}

	public function editDish(Request $request, Response $response) {
		$data = $request->all();
		$validator = Validator::make($data, [
			"id" => "required|numeric",
			"name" => "required|min:1",
			"weight" => "required|numeric",
			"file" => "required",
			"price" => "required|numeric",
			"type" => "required"
		]);
		
		if ($validator->fails()) {
			return view('dishes.edit', ['errors' => $validator->errors()->all()]);
		}
		
		try {
			DB::beginTransaction();
			
			$dish = Dish::where("ID", $data['id'])->first();
			
			if(file_exists(base_path('resources/assets/images') . "/" . $dish->image_name)){
				unlink(base_path('resources/assets/images') . "/" . $dish->image_name);
			} else {
				Log::debug('Failed to delete file');
			}
				
			$file = $request->file("file");
			if ($file->isValid() === false) {
				DB::rollBack();
			
				return view('dishes.creation', ['errors' => ['Невалиден файл.']]);
			}
			
			$imageName = round(microtime(true) * 1000) . "." . $file->getClientOriginalExtension();
			
			try {
				$file->move(base_path('resources/assets/images'), $imageName);
			} catch (Exception $exception) {
				DB::rollBack();

				return view('dishes.creation', ['errors' => [$exception->getMessage()]]);
			}
			
			$queryResult = $dish->update([
				"name" => $data['name'],
				"weight" => $data['weight'],
				"description" => $data['description'] == null ? "" : $data['description'],
				"image_name" => $imageName,
				"price" => $data['price'],
				"type" => $data['type']
			]);
			
			if ($queryResult === 0) {
				DB::rollBack();
				
				return view('dishes.edit', ['errors' => ['Неуспешно редактиране на ястие.']]);
			}
		} catch (Exception $exception) {
			DB::rollBack();
			
			return view('dishes.edit', ['errors' => [$exception->getMessage()]]);
		}
		
		DB::commit();

		return view('dishes.edit', ['success' => 'Успешно редактиране на ястие.']);
	}
	
	public function loadEditDishView(Request $request, Response $response) {
		return view('dishes.edit', ['dishes' => Dish::all()]);
	}
	
	public function loadEditDishViewById(Request $request, Response $response, $id) {
		return view('dishes.edit', ['dish' => Dish::find($id)]);
	}
	
	public function deleteDishById(Request $request, Response $response) {
		$data = $request->all();
		
		$validator = Validator::make($data, [
				"id" => "required|numeric"
		]);
		
		if ($validator->fails()) {
			return view('dishes.deletion', ['errors' => $validator->errors()->all()]);
		}
		
		$dish = $this->findDishById($data['id']);
		
		if ($dish === null) {
			return view('dishes.deletion', ['errors' => ['Ястието не беше открито.']]);
		}
		
		$deletedRows = $dish->delete();
		
		if ($deletedRows === 0) {
			return view('dishes.deletion', ['errors' => ['Неуспешно изтриване на ястие.']]);
		}
		
		return view('dishes.deletion', ['success' => 'Успешно изтрито ястие.']);
	}

	public function loadDishDeletionView(Request $request, Response $response) {
		return view('dishes.deletion', ['dishes' => Dish::all()]);
	}
	
	private function findDishById($id) {
		return Dish::find($id);
	}
}