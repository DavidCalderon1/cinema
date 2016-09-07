<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $table = 'towns';
	
    protected $fillable = ['name','state_id'];
	
	//retorna todos los estados correspondientes a partir del state_id recibido 
	public static function towns($id){
		return Town::where('state_id','=',$id)->get();
	}
}
