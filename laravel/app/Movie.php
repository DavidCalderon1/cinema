<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
//usar la libreria del query builder
use DB;

class Movie extends Model
{
    protected $table = 'movies';
	
    protected $fillable = ['name','path','cast','direction','duration','genre_id'];
	// se crea un mutador, el cual sirve para modificar los elementos antes de ser guardados con set[]Attribute
	// se especifica la fecha actual ::now()->second, el segundo con el que es subido concatenado al nombre del archivo
	// subir el archivo \Storage... con el metodo put
	// todo esto dentro de la validacion del path, verificando que no este vacio
	public function setPathAttribute($path){
		if(! empty($path)){
			$name = Carbon::now()->second.$path->getClientOriginalName();
			$this->attributes['path'] = $name;
			\Storage::disk('local')->put($name, \File::get($path));
		}
	}
	
	// metodo para colsultar con el query builder
	// se crea un join entre la tabla genres y movies por el campo genre_id
	// se selecciona todo * de la tabla movies y solo el genre de la tabla genres
	// para finalizar se obtiene la consulta
	public static function Movies(){
		return DB::table('movies')
			->join('genres','genres.id','=','movies.genre_id')
			->select('movies.*', 'genres.genre')
			->get();
	}
}
