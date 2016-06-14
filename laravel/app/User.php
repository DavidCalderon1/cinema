<?php

namespace Cinema;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
	use SoftDeletes;
	 /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
		
	//para setear la contraseña cada vez que sea cambiada, es decir ser encriptada
	public function setPasswordAttribute($valor){
		if( !empty($valor) ){
			$this->attributes['password'] = \Hash::make($valor);
		}
	}
}
