<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Profesional extends Model
{
    // nombre de la tabla
    protected $table = 'profesionales';

    /**
     * Un maestro puede ser una subseccion, por lo que puede tener un maestro padre
     */

    protected $fillable = [
        'nombre', 'active','created_at','updated_at', 'apellido', 'matricula', 'active', 'calle', 'numero', 'codigo_postal', 'telefono', 'datos_complementarios', 'comentarios', 'fecha_nacimiento', 'lugar', 'cuit', 'retiene_ganancia', 'banco', 'tipo_cuenta', 'num_cuenta', 'ingreso_bruto', 'tipo_ingreso_bruto', 'cond_iva', 'fecha_ingreso_coc', 'fecha_desde', 'fecha_hasta',

    ];

    
}
