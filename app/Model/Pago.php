<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    // nombre de la tabla
    protected $table = 'pagos';

    /**
     * Un maestro puede ser una subseccion, por lo que puede tener un maestro padre
     */

    protected $fillable = [
        'fecha', 'importe','idliquidacion','idprofesional','obras','created_at','updated_at',
    ];


     public function liquidacion()
    {

        return $this->belongsTo('App\Model\Liquidacion','idliquidacion','id');
    }


     public function profesional()
    {

        return $this->belongsTo('App\Model\Profesional','idprofesional','id');
    }

   /*  public function obra()
    {

        return $this->belongsTo('App\Model\Obra','idobra','id');
    }*/

     public function obras(){
        return $this->hasMany(Obra::class, "user_id", "id");
    }

    
}
