<?php

namespace App\Repositories;

use App\Models\staff;
use InfyOm\Generator\Common\BaseRepository;

class staffRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pruebauno',
        'pruebados'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return staff::class;
    }
}
