<?php

namespace App\Repositories;

use App\Models\Projet;
use App\Repositories\BaseRepository;

/**
 * Class ProjetRepository
 * @package App\Repositories
 * @version June 7, 2021, 5:42 pm UTC
*/

class ProjetRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom_projet',
        'statut'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Projet::class;
    }
}
