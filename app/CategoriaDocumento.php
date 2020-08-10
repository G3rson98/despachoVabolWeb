<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaDocumento extends Model
{
    protected $table='categoriadoc';   
    public $timestamps = false;
    protected $primaryKey = 'catdoc_id';

    public function documento()
    {
        return $this->hasMany('App\Documento');
    }
    

}
