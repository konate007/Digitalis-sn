<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Formation
 * @package App\Models
 * @version June 7, 2021, 5:37 pm UTC
 *
 * @property string $nom_formation
 * @property string $date_debut
 * @property string $date_fin
 */
class Formation extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'formations';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom_formation',
        'date_debut',
        'date_fin'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom_formation' => 'string',
        'date_debut' => 'string',
        'date_fin' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom_formation' => 'required',
        'date_debut' => 'required',
        'date_fin' => 'required'
    ];

    
}
