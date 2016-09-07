<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
| post, get, put, delete, patch, options
*/
// direcciona al metodo 'index' del controlador FrontController
Route::get('/','FrontController@index');
// direcciona al metodo 'contacto' del controlador FrontController
Route::get('contacto','FrontController@contacto');
// direcciona al metodo 'reviews' del controlador FrontController
Route::get('reviews','FrontController@reviews');
// direcciona al metodo 'admin' del controlador FrontController
Route::get('admin','FrontController@admin');

//esto sirve para que se muestre una vista para poder especificar que cuenta de correo se va a asignar para restablecer el password
Route::get('password/email','Auth\PasswordController@getEmail');
Route::post('password/email','Auth\PasswordController@postEmail');
//de esta manera se recibe la confirmacion del reset del password desde el correo enviado al email del usuario
Route::get('password/reset/{token}','Auth\PasswordController@getReset');
Route::post('password/reset','Auth\PasswordController@postReset');

// direcciona a todos los metodos por defecto del controlador MailController
Route::resource('mail','MailController');
// direcciona a todos los metodos por defecto del controlador UsuarioController
Route::resource('usuario','UsuarioController');
// direcciona a todos los metodos por defecto del controlador GeneroController para los generos
Route::resource('genero','GeneroController');
// direcciona a todos los metodos por defecto del controlador MovieController para las peliculas
Route::resource('pelicula','MovieController');

// direcciona a todos los metodos por defecto del controlador LogController para la autenticacion
Route::resource('log','LogController');
// direcciona al metodo logout del controlador LogController para la autenticacion
Route::get('logout','LogController@logout');


// direcciona a todos los metodos por defecto del controlador StateController para los selects dinamicos 
Route::resource('states','StateController');
// direcciona al metodo getTowns del controlador StateController para los selects dinamicos 
Route::get('towns/{id}','StateController@getTowns');



//OTRAS RUTAS

Route::get('greeting','PruebaController@greeting');

// direcciona al metodo 'index' del controlador PruebaController
Route::get('controlador','PruebaController@index');
/*
// direcciona al metodo 'nombre' del controlador PruebaController
Route::get('name/{nombre}','PruebaController@nombre');

//si en la url principal escriben la palabra prueba muestra en pantalla el mensaje configurado
Route::get('prueba', function () {
	return 'Un saludos desde route.php';
});
// captura el parametro de nombre y lo regresa concatenado a un mensaje
Route::get('nombre/{nombre}', function($nombre){
	return 'Su nombre es: '.$nombre;
});
// captura el parametro de nombre y lo regresa concatenado a un mensaje
// pero en el caso que no lo envien asigna por defecto el nombre pepito
Route::get('nombre2/{nombre?}', function($nombre = 'pepito'){
	return 'Su nombre es: '.$nombre;
});
// captura el parametro de edad y lo regresa concatenado a un mensaje
Route::get('edad/{edad}', function($edad){
	return 'Su edad es: '.$edad;
});
// direcciona a la vista welcome
Route::get('/', function () {
    return view('welcome');
});
*/

/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::group(['prefix' => 'v1'], function () {
        require config('infyom.laravel_generator.path.api_routes');
    });
});


//Route::resource('staff', 'staffController');

Route::auth();

Route::get('/home', 'HomeController@index');
