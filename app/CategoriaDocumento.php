<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaDocumento extends Model
{
    protected $table='categoriadoc';   
    public $timestamps = false;
    protected $primaryKey = 'catdoc_id';

    protected $fillable = ['catdoc_nombre', 'catdoc_descripcion'];

    public function documento()
    {
        return $this->hasMany('App\Documento');
    }
    

}
