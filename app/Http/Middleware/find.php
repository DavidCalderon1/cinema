<?php

namespace Cinema\Http\Middleware;

use Closure;
// esta libreria va a dar la facilidad de obtener parametros que se encuentran en nuestra ruta
use Illuminate\Routing\Route;
//use Illuminate\Support\Facades\Route;
use Cinema\User;

class find
{
	public $router;
	
	public function __construct(Route $route)
    {
		//$route = Route::getRoutes();
		 $router = $route->getParameter('usuario');
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->user = User::find( $router );
		return $this->user;
		return $next($request);
    }
}
