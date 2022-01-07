<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PagoItem extends Model
{
    
	protected $table = 'pagos_items';

    protected $fillable = [
    
        'idpago','idobra','total_fact_odont','porcentaje_cobro','total','fecha','created_at','updated_at'
 
    ];

    public function pago()
    {
         return $this->belongsTo('App\Model\Pago', 'idpago', 'id');
    }

    public function obra()
    {
         return $this->belongsTo('App\Model\Obra', 'idobra', 'id');
    }


}
