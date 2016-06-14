<?php

namespace Cinema\Http\Controllers\Auth;

//son requeridos para el metodo resetPassword, en el caso de usar la version 5.2 de laravel
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Cinema\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

	//por defecto la configuracion de laravel y el reset password hace que se redireccione a la url /home pero como no lo tenemos asi entonces se debe especificar a cual
	//el otro problema es que el la aplicacion se configuro para que encriptara el password y los procesos de laravel para el reset password lo encriptan tambien, entonces hay que crear el metodo por si mismo para que no lo encripte dos veces
	// lo mencionado anteriormente se puede comprobar en los archivos de configuracion de auth y especificamente en el que usa el controlador PasswordController
	// el archivo esta en: \vendor\laravel\framework\src\Illuminate\Foundation\Auth\ResetsPasswords.php
	// entonces se copia la funcion resetPassword al controlador y se quita la instruccion de la encripcion
	protected $redirectTo = '/admin';
	/*
	protected function resetPassword($user, $password){
		$user->password = $password;
		$user->save();
		Auth::login($user);
	}
	*/
	protected function resetPassword($user, $password)
    {
        $user->forceFill([
            'password' => $password,
            'remember_token' => Str::random(60),
        ])->save();

        Auth::guard($this->getGuard())->login($user);
    }
    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
