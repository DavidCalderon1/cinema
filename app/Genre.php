<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genres';
	
	//selecciona los campos de la tabla que pueden ser llenados
	protected $fillable = ['genre'];
}
