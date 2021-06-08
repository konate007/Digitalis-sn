<?php

namespace App\Repositories;

use App\Models\Partenaire;
use App\Repositories\BaseRepository;

/**
 * Class PartenaireRepository
 * @package App\Repositories
 * @version June 7, 2021, 5:40 pm UTC
*/

class PartenaireRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom_partenaire'
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
        return Partenaire::class;
    }
}
