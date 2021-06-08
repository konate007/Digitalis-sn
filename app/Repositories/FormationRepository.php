<?php

namespace App\Repositories;

use App\Models\Formation;
use App\Repositories\BaseRepository;

/**
 * Class FormationRepository
 * @package App\Repositories
 * @version June 7, 2021, 5:37 pm UTC
*/

class FormationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom_formation',
        'date_debut',
        'date_fin'
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
        return Formation::class;
    }
}
