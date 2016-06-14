<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;

use Cinema\Http\Requests;
//incluir los modelos Genre y Movie
use Cinema\Genre;
use Cinema\Movie;
//agregar las librerias requeridas para manejar la session, el redirect y los datos en la ruta
use Session;
use Redirect;
use Illuminate\Routing\Route;

class MovieController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
        //adminitido hasta la version 5.1.* de laravel
		//$this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }
    public function find(Route $route){
        /*
		//adminitido hasta la version 5.1.* de laravel
		$this->movie = Movie::find($route->getParameter('pelicula'));
		if(! $this->movie ){
			abort(404);
		}
		*/
    }
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
	 * almacena la consulta al metodo Movies del modelo Movie y retorna la vista pelicula.index con los resultados
     */
    public function index()
    {
        $movies = Movie::Movies();
        return view('pelicula.index',compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		//se lista el genero y el id correspondiente a todos los generos
        $genres = Genre::lists('genre', 'id');
        return view('pelicula.create',compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Movie::create($request->all());
		Session::flash('message','Pelicula Creada Correctamente');
        return Redirect::to('/pelicula');
		//return "Listo";
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
        $movie = Movie::find($id);
		$this->notFound($movie);
		$genres = Genre::lists('genre', 'id');
        return view('pelicula.edit',['movie'=>$movie,'genres'=>$genres]);
		//admitido hasta la version 5.1.* de laravel
        //return view('pelicula.edit',['movie'=>$this->movie,'genres'=>$genres]);
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
        $movie = Movie::find($id);
		$movie->fill($request->all());
        $movie->save();
        Session::flash('message','Pelicula Editada Correctamente');
        return Redirect::to('/pelicula');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
		$movie->delete();
		//elimina el archivo fisico
        \Storage::delete($movie->path);
        Session::flash('message','Pelicula Eliminada Correctamente');
        return Redirect::to('/pelicula');
    }
}
