<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthorization {
	
    public function handle($request, Closure $next, $guard = null) {
    	$user = $this->extractUserFromSession($request);
    	
    	if ($user === null) {
    		return response('Unauthorized.', 401);
    	}
    	
    	foreach ($user->roles as $userRole) {
    		if ($userRole->name === "Administrator") {
		        return $next($request);
    		}
    	}
		
    	return redirect()->guest('forbidden');
    }
    
    private function extractUserFromSession($request) {
    	return $request->session()->get('user');
    }
    
}
