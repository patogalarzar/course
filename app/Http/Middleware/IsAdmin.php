<?php namespace Course\Http\Middleware;

use Closure;

use Illuminate\Contracts\Auth\Guard;

class IsAdmin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */

	//los middleware se registran en app\Http\Kernel.php

	//para utilizar al clase auth se necesita pasal la clase por inyeccion de dependencia mediante un constructor

	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	public function handle($request, Closure $next)
	{
		// dd($this->auth->user());
		if ( ! $this->auth->user()->isAdmin()) 
		{
			$this->auth->logout();

			if ($request->ajax()) {
				return response('unauthorized.', 401);
			} else {
				return redirect()->to('auth/login');
			}
			
		}

		return $next($request);
	}

}
