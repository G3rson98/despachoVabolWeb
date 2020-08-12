<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table='comentario';   
    public $timestamps = false;
    protected $primaryKey = 'com_id';

    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }

    public function parent(){
        return $this->belongsTo('App\Comentario');
    }

    public function comentario()
    {
        return $this->hasMany('App\Comentario');
    }

    public function documento()
    {
        return $this->belongsTo('App\Documento','com_doc');
    }

}
