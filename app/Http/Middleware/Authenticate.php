<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate {
	
    public function handle($request, Closure $next, $guard = null) {
    	if ($this->isAuthenticationMarkedAsPassed($request)) {
    		return $next($request);
    	}
    	
    	if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }

        return $next($request);
    }
    
    private function isAuthenticationMarkedAsPassed($request) {
    	return $request->session()->get('authentication') === "passed";
    }
}
