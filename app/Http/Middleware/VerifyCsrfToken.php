<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'wechat/*'
    ];

    public function handle($request, Closure $next)
    {
        if ($this->isReading($request) || $this->excludedRoutes($request) || $this->tokensMatch($request))
        {
            return $this->addCookieToResponse($request, $next($request));
        }

        throw new TokenMismatchException;
    }

    protected function excludedRoutes($request)
    {
        $routes = [
            'admin/image/upload_image',


        ];

        foreach($routes as $route)
            if ($request->is($route))
                return true;

        return false;
    }
}
