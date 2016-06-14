<?php 
	namespace Cinema\Http\Controllers;
	
	use Cinema\Http\Controllers\Controller;
	
	class PruebaController extends Controller {
		/**
		 * Show the application welcome screen to the user.
		 *
		 * @return Response
		 */
		public function index()
		{
			return 'Hola desde PruebaController';
		}
		public function greeting()
		{
			$return = "el codigo no funciona aqui, buscar donde se coloca
			\n 
			View::creator('layout', function(\$view) { 
				\$view->with('foo', 'bar'); 
			});";
			
			return $return;
		}
		
		public function nombre($nombre){
			return 'Hola mi nombre es: '.$nombre;
		}
	}
?>