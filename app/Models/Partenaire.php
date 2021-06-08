<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Partenaire
 * @package App\Models
 * @version June 7, 2021, 5:40 pm UTC
 *
 * @property string $nom_partenaire
 */
class Partenaire extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'partenaires';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom_partenaire'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom_partenaire' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom_partenaire' => 'required'
    ];

    
}
