<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PagoItem extends Model
{
    
	protected $table = 'pagos_items';

    protected $fillable = [
    
        'idpago','idprofesional','total_fact_odont','porcentaje_cobro','total','fecha','created_at','updated_at'
 
    ];

    public function pago()
    {
         return $this->belongsTo('App\Model\Pago', 'idpago', 'id');
    }

    public function profesional()
    {
         return $this->belongsTo('App\Model\Profesional', 'idprofesional', 'id');
    }


}
