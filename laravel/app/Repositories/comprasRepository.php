<?php

namespace App\Repositories;

use App\Models\compras;
use InfyOm\Generator\Common\BaseRepository;

class comprasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'precio',
        'cantidad'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return compras::class;
    }
}
