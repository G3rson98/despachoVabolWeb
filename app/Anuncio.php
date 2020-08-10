<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    protected $table = 'anuncio';

    public $timestamps = false;

    protected $primaryKey = 'anu_id';

    protected $fillable = ['anu_id','anu_titulo','anu_contenido','anu_estado','anu_fechapub','anu_horapub','anu_abogado','anu_categoria'];

    public function abogado()
    {
        return $this->belongsTo('App\Abogado');
    }

    public function categoriaanuncio()
    {
        return $this->belongsTo('App\CategoriaAnuncio');
    }
}
