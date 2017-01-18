<?php

namespace App\Http\Controllers;

use Validator;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Auth;

use App\User;
use App\Http\Controllers\Controller;

class Users extends Controller {
	
	public function createUser(Request $request, Response $response) {
		$data = $request->all();
		
		$validator = Validator::make($data, [
				'email' => 'required|email|max:255|unique:users',
				'password' => 'required|min:6',
				'firstname' => 'required|min:1|max:255',
				'lastname' => 'required|min:1|max:255',
				'phone' => 'required|min:3|max:255',
		]);
	
		if ($validator->fails()) {
			return view('users.registration', ['errors' => $validator->errors()->all()]);
		}
	
		$user = User::create([
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			'firstname' => $data['firstname'],
			'lastname' => $data['lastname'],
			'phone' => $data['phone']
		]);

		if ($user === null) {
			return view('registration.index', ['errors' => ['Failed to create user.']]);
		}
		
		return view('login.index', ['success' => 'Successfully created user.']);
	}
	
	public function editUser(Request $request, Response $response) {
		$validator = Validator::make($request->all(), [
				'id' => 'required|numeric',
				'email' => 'required|email|max:255',
				'password' => 'required|min:6',
				'firstname' => 'required|min:1',
				'lastname' => 'required|min:1',
				'phone' => 'required|min:3',
		]);
		
		if ($validator->fails()) {
			return view('users.edit', ['errors' => $validator->errors()->all()]);
		}
		
		$data = $request->all();
		
		$queryResult = User::where("id", $data['id'])->update([
				"email" => $data['email'],
				"password" => bcrypt($data['password']),
				"firstname" => $data['firstname'],
				"lastname" => $data['lastname'],
				"phone" => $data['phone']
		]);
		
		if ($queryResult > 0) {
			return view('users.edit', ['errors' => ['Failed to update user']]);
		}
		
		return view('users.edit', ['success' => 'Successfully updated user.']);
	}
	
	public function loadEditView() {
		$user = Auth::user();
		if ($user === null) {
			return view('users.edit', ['errors' => ['There is no logged in user.']]);
		}
		
		return view('users.edit', ['user' => $user]);
	}
	
	private function getRemoteUser(Request $request, Response $response) {
		return Auth::user();
	}
}
