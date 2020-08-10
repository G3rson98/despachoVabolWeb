<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abogado extends Model
{
    protected $table='abogado';

    public $timestamps = false;

    protected $primaryKey = 'abg_ci';

    protected $fillable=['abg_ci', 'abg_nombre', 'abg_apellidop', 'abg_apellidom', 'abg_especialidad', 'abg_celular', 
                        'abg_fnacimiento', 'abg_genero','abg_nrocolabogados', 'abg_nrominjusticia', 'abg_numregcorte'];
    public function user(){
        return $this->hasOne('App\User');
    }

    public function documento(){
        return $this->hasMany('App\Documento');
    }
    
    public function anuncio(){
        return $this->hasMany('App\Anuncio');
    }
}

