<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Liquidacion extends Model
{
    // nombre de la tabla
    protected $table = 'liquidaciones';



    protected $fillable = [
        'fecha','federacion_cuota','colegio_cuota','colegio_alicuota','liquida_imp','created_at','updated_at',
    ];

   
    
}
