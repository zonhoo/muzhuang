<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Illuminate\Session\TokenMismatchException;

class VerifyCsrfToken extends BaseVerifier {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		//return parent::handle($request, $next);

        // Add this:
        if($request->method() == 'POST'||$request->method() == 'PATCH'||$request->method() == 'PUT')
        {
            return $next($request);
        }
        //dd($request->method());
        if ($request->method() == 'GET' || $this->tokensMatch($request))
        {
            return $next($request);
        }
        throw new TokenMismatchException;
	}

}
