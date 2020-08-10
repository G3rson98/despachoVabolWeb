<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaAnuncio extends Model
{
    protected $table = 'categoriaanuncio';

    public $timestamps = false;

    protected $primaryKey = 'cat_id';

    protected $fillable = ['cat_id','cat_nombre','cat_descripcion'];

    public function anuncio()
    {
        return $this->hasMany('App\Anuncio');
    }
}
