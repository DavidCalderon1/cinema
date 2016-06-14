<?php

namespace App\Repositories;

use App\Models\miprueba;
use InfyOm\Generator\Common\BaseRepository;

class mipruebaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'campouno',
        'campodos'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return miprueba::class;
    }
}
