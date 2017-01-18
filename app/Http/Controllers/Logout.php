<?php
namespace App\Http\Controllers;

use Auth;
use Validator;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;

class Logout extends Controller {
	
	public function logout(Request $request) {
		$request->session()->invalidate();
		
		return redirect()->to('');
	}
	
}