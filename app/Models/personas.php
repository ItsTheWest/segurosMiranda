<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class personas extends Model
{
    protected $table = 'personas';

    protected $fillable = [
        'CI',
        'nombre',
        'apellido',
        'nacimiento',
        'sexo',
        'numero',
        'ramo',
    ];
    public $timestamps = true;
}
