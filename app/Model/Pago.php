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
        'fecha', 'importe','idliquidacion','idobra','profesionales','created_at','updated_at','iva', 'descuento', 'subtotal', 'total'];


     public function liquidacion()
    {

        return $this->belongsTo('App\Model\Liquidacion','idliquidacion','id');
    }


     public function obra()
    {

        return $this->belongsTo('App\Model\Obra','idobra','id');
    }

   /*  public function obra()
    {

        return $this->belongsTo('App\Model\Obra','idobra','id');
    }*/



    
}
