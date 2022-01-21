<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    
	protected $table = 'descuentos';

    protected $fillable = [
    
        'idpago','idobra','nombre','valor','total_descuento','fecha','created_at','updated_at'
 
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
