<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table='documento'; 
    public $timestamps = false;
    protected $primaryKey = 'doc_id';

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function abogado()
    {
        return $this->belongsTo('App\Abogado');
    }

    public function categoriadoc()
    {
        return $this->belongsTo('App\CategoriaDocumento');
    }

    public function comentario()
    {
        return $this->hasMany('App\Comentario');
    }


}
