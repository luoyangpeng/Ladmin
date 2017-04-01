<?php
namespace App\Http\Middleware;

use Closure;

class SSOClientMiddleware {
	public function handle($request, Closure $next) {
		
		$ticket = $request->get('ticket','');
		$ssoServer = env('SSO_SERVER');
		
		if(!$ticket) {
			$ticket = isset($_COOKIE['ticket']) ? $_COOKIE['ticket'] : '';
		}
		
		if(!$ticket) {
			return redirect($ssoServer."/login?oauth_callback=".$request->url());
		}

		return $next($request);
	}
}