<?php
namespace App\Http\Middleware;

use Closure;
use App\Lib\LibWaf;

class XssMiddleware {
	public function handle($request, Closure $next) {
		$waf = new LibWaf();
		$waf->startFilter();
		return $next($request);
	}
}