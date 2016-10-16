<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Validator;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    public function __construct() {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    public function authenticate(Request $request, Response $response) {
    	if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    		return redirect()->intended('');
    	}

    	return view('login.index', ['errors' => ['Login failed.']]);
    }
}
