<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    // nombre de la tabla
    protected $table = 'obras';

    /**
     * Un maestro puede ser una subseccion, por lo que puede tener un maestro padre
     */

    protected $fillable = [
        'nombre','importe', 'active','created_at','updated_at',
    ];

    
}
