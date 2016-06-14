<?php

namespace Cinema\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
	
	//este metodo se usara para mostrar una pagina 404 en el caso de no encontrar el recurso
	//el parametro $value es la variable que almacena el resultado de la consulta
	public function notFound($value){
		if(! $value ){
			abort(404);
		}
	}
}
