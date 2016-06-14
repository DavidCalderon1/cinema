<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Cinema\Http\Requests;
use Cinema\Http\Requests\LoginRequest;
use Auth;
use Session;
use Redirect;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * efectua el logout del usuario.
     *
     * @return redirecciona a la raiz
     */
    public function logout()
    {
		//el metodo logout lo brinda el facade Auth
        Auth::logout();
		return Redirect::to('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginRequest $request)
    {
		//return $request->email;
        //se utiliza el facade Auth y la propiedad attempt que recibe un array, 
		//donde se pregunta si el email es igual a los que se esta recibiendo, al igual que para el password
		//si es cierto entonces que redireccione a el panel de administracion
		// y sino, se envia un mensaje al usuario indicando que los datos son incorrectos y lo retorna a la raiz de la aplicacion
		if(Auth::attempt( ['email' => $request['email'], 'password' => $request['password'] ] ) ){
			return Redirect::to('admin');
		}else{
			Session::flash('message-error','Los Datos son incorrectos');
			return Redirect::to('/');
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
