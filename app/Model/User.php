<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'telefono','declaracion','contacto_emergencia' ,'fecha_contrato' ,'fecha_despido', 'images','nombre','apellido','segundo_nombre','cargo','idrole', 'email', 'password','active', 'apellido', 'domicilio', 'tipo_empleo', 'departamento', 'ciudad', 'estado', 'codigo_postal', 'fecha_nacimiento', 'seguro_social', 'tipo_cuenta', 'titular_cuenta', 'ruta_transito', 'numero_cuenta', 'forma_pago','tipo_pago', 'pago_hora',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function role()
    {

        return $this->belongsTo('App\Model\Role','idrole','id');
    }

}
