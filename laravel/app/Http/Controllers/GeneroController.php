<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
//incorporamos el request GenreRequest
use Cinema\Http\Requests\GenreRequest;
use Cinema\Http\Requests;
//incorporamos el modelo
use Cinema\Genre;
//solo hasta version 5.1.* de laravel
use Illuminate\Routing\Route;

class GeneroController extends Controller
{
	//beforeFilter admitido solo hasta version 5.1.* de laravel
	/*
	//el constructor y el metodo find reducen la busqueda de los datos del genero para cada accion ['edit','update','destroy']
	public function __construct(){
        $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }
    public function find(Route $route){
        $this->genre = Genre::find($route->getParameter('genero'));
    }
	*/
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    	
	//va a recibir una peticion tipo get mediante AJAX 
	public function index(Request $request)
    {
		//se va a encargar de listar todos los generos mediante json
		if ($request->ajax()) {
            $genres = Genre::all();
            return response()->json($genres);
        }
        return view('genero.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genero.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenreRequest $request)
    {
		//si el request es de tipo ajax entonces usa el modelo Genre para guardar todo lo que el request recibe y retorna un mensaje de tipo json
        if($request->ajax()){
			//crear el genero con el modelo Genre
			Genre::create($request->all());
			return response()->json([
				"mensaje" => "Creado"
			]);
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
        $genre = Genre::find($id);
        return response()->json($genre);
		//solo hasta version 5.1.* de laravel, solo se requiere un linea gracias al constructor
		//return response()->json($this->genre);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GenreRequest $request, $id)
    {
        //busca el genero por el id recibido
		$genre = Genre::find($id);
		//actualiza los datos del genero
		$genre->fill($request->all());
		//guarda los cambios
        $genre->save();
		
		//solo hasta version 5.1.* de laravel, se reduce a tres lineas gracias al constructor
		//$this->genre->fill($request->all());
        //$this->genre->save();
        return response()->json(["mensaje" => "listo"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //busca el genero por el id recibido
		$genre = Genre::find($id);
		//elimina los datos del genero
		$genre->delete();
		//solo hasta version 5.1.* de laravel, se reduce a dos lineas gracias al constructor
		//$this->genre->delete();
        return response()->json(["mensaje"=>"borrado"]);
    }
}
