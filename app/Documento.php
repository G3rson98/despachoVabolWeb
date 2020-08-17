<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table='documento'; 
    public $timestamps = false;
    protected $primaryKey = 'doc_id';

    
    protected $fillable = ['doc_id', 'doc_descripcion', 'doc_fechasubida', 'doc_horasubida', 'doc_titulo', 'doc_url', 'doc_cliente', 'doc_abogado', 'doc_categoriadoc', 'doc_idmail'];

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
        return $this->belongsTo('App\CategoriaDocumento', 'doc_categoriadoc');
    }

    public function comentario()
    {
        return $this->hasMany('App\Comentario', 'com_doc');
    }


}
