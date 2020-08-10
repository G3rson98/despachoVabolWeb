<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudContacto extends Model
{
    protected $table = 'solicitudcontacto';

    public $timestamps = false;

    protected $primaryKey = 'sol_id';

    protected $fillable = ['sol_id','sol_nombre','sol_apellido','sol_fecha','sol_celular','sol_estado','sol_email','sol_contenido','sol_abogado'];

    public function abogado()
    {
        return $this->belongsTo('App\Abogado');
    }
}
