<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;

use Cinema\Http\Requests;
//incorporar el modelo Movie
use Cinema\Movie;

class FrontController extends Controller
{
    
    public function __construct()
    {
		//especificamos que vamos a usar el middleware auth, pero solo que aplique para el metodo admin
        $this->middleware('auth', ['only' => 'admin']);
    }
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the contacto form.
     *
     */
    public function contacto()
    {
        return view('contacto');
    }

    /**
     * Show the reviews form.
     *
     */
    public function reviews()
    {
        //almacena los datos del metodo Movies del modelo Movie y retorna la vista enviando la variable movies
		$movies = Movie::Movies();
		return view('reviews',compact('movies'));
    }

    /**
     * Show the admin form.
     *
     */
    public function admin()
    {
        return view('admin.index');
    }

}
