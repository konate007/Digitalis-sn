<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Projet
 * @package App\Models
 * @version June 7, 2021, 5:42 pm UTC
 *
 * @property string $nom_projet
 * @property string $statut
 */
class Projet extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'projets';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom_projet',
        'statut'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom_projet' => 'string',
        'statut' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom_projet' => 'required',
        'statut' => 'required'
    ];

    
}
