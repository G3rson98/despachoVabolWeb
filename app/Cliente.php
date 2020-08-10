<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='cliente';

    public $timestamps = false;

    protected $primaryKey = 'cl_nit';

    protected $keyType = 'string';

    protected $fillable=['cl_nit', 'cl_ciudad', 'cl_descripcion', 'cl_direccion', 'cl_nrepresentante', 'cl_paginaweb', 
                        'cl_pais', 'cl_razonsocial','cl_rubro', 'cl_telefono'];

    public function user(){
        return $this->hasOne('App\User');
    }
    public function documento(){
        return $this->hasMany('App\Documento');
    }
}
