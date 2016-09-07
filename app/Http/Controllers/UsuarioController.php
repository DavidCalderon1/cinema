<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Cinema\Http\Requests;
use Cinema\Http\Requests\UserCreateRequest;
use Cinema\Http\Requests\UserUpdateRequest;
use Cinema\User;
use Session;
use Redirect;
// esta libreria va a dar la facilidad de obtener parametros que se encuentran en nuestra ruta
use Illuminate\Routing\Route;

class UsuarioController extends Controller
{
	//metodo constructor
	public function __construct(){
		
		//especificamos que vamos a usar el middleware auth en todo el controlador
		$this->middleware('auth');
		//especificamos que vamos a usar el middleware admin en todo el constructor
		$this->middleware('admin');
		
		//filtro que se ejecutara antes de cualquier accion del controlador, se especifica el metodo que se desea ejecutar
			//$this->beforeFilter('@find',['only' => ['edit','update','destroy'] ]);
			//$this->middleware('find',['only' => ['edit','update','destroy'] ]);
		
	}
	//metodo find ejecutado por el metodo beforeFilter dentro del constructor
	public function find(Route $route){
		//va a buscar los parametros que estan el esta ruta y que son enviados por el recurso, que en este caso es 'usuario' el configurado en las rutas
		//$this->user = User::find( $route->getParameter('usuario') );
		//return $this->user;
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		// trae una cantidad limitada de elementos que tenga la tabla users y los almacena en la variable $users
        $users = User::paginate(3);
		//valida si existe una peticion de tipo ajax() y devuelve una respuesta de tipo json con la vista usuario.users
		if($request->ajax()){
			return response()->json(view('usuario.users',compact('users'))->render());
		}
		// retorna la vista /usuario/index.blade.php agregandole los datos de la variable users
		return view('usuario.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        User::create( $request->All() );
		
		//return 'Usuario Creado Correctamente';
		Session::flash('message','Usuario Creado Correctamente');
        return Redirect::to('/usuario');
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
		//a la variable $user se le asigna el resultado de la busqueda del usuario a partir del id recibido
        $user = User::find($id);
		//se retorna una vista a la cual se envia el parametro user con el valor de la variable asignada $user
		//return view('usuario.edit', ['user'=>$this->user]);
		return view('usuario.edit', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        //a la variable $user se le asigna el resultado de la busqueda del usuario a partir del id recibido
        $user = User::find($id);
		//almacenar la actualizacion que realiza el usuario, de acuerdo a los campos fillable
		$user->fill($request->all());
		//guardar el usuario
		$user->save();
		//configurar el mensaje que se almacenara en la variable Session
		Session::flash('message','Usuario Actualizado Correctamente');
		//redirecciona al index del usuario
		return Redirect::to('/usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		//a la variable $user se le asigna el resultado de la busqueda del usuario a partir del id recibido
        $user = User::find($id);
		//este metodo usa el campo deleted_at para colocar la fecha de eliminacion y asi oculta el recurso al usuario
        $user->delete();
		//configurar el mensaje que se almacenara en la variable Session
		Session::flash('message','Usuario Eliminado Correctamente');
		//redirecciona al index del usuario
		return Redirect::to('/usuario');
    }
}
