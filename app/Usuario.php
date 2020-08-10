<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
    protected $table='usuario';

    public $timestamps = false;

    protected $primaryKey = 'usu_id';

    public function abogado()
    {
        return $this->belongsTo('App\Abogado');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function comentario(){
        return $this->hasMany('App\Comentario');
    }
}
