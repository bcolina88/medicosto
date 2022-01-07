<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    
	protected $table = 'descuentos';

    protected $fillable = [
    
        'idpago','idprofesional','nombre','valor','total_descuento','fecha','created_at','updated_at'
 
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
