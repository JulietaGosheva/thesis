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
				'password' => 'required|min:8|confirmed',
				'firstname' => 'required|min:1|max:255',
				'lastname' => 'required|min:1|max:255',
				'phone' => 'required|min:10|regex:/^\+?\d+$/',
		]);
	
		if ($validator->fails()) {
			return view('registration.index', ['errors' => $validator->errors()->all()]);
		}
	
		$user = User::create([
			'email' => $data['email'],
			'password' => bcrypt($data['password'] . "salt"),
			'firstname' => $data['firstname'],
			'lastname' => $data['lastname'],
			'phone' => $data['phone']
		]);

		if ($user === null) {
			return view('registration.index', ['errors' => ['Неуспешно създаване на профил, моля да ни извините.']]);
		}
		
		return view('login.index', ['success' => 'Успешна регистрация.']);
	}
	
	public function editUser(Request $request, Response $response) {
		$validator = Validator::make($request->all(), [
				'email' => 'required|email|max:255',
				'password' => 'required|confirmed|min:8',
				'firstname' => 'required|min:1',
				'lastname' => 'required|min:1',
				'phone' => 'required|min:10|regex:/^\+?\d+$/',
		]);
		
		if ($validator->fails()) {
			return view('users.edit', ['errors' => $validator->errors()->all()]);
		}
		
		$user = Auth::user();
		$data = $request->all();
		
		$queryResult = User::where("id", $user->id)->update([
				"email" => $data['email'],
				"password" => bcrypt($data['password']. "salt"),
				"firstname" => $data['firstname'],
				"lastname" => $data['lastname'],
				"phone" => $data['phone']
		]);
		
		if ($queryResult === 0) {
			return view('users.edit', ['errors' => ['Неуспешно редактиране на потребителските данни.']]);
		}
		
		return view('users.edit', ['success' => 'Успешно редактиране на потребителските данни.']);
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
