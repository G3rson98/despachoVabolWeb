<?php

namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Authenticatable
{
    use Notifiable;
    //
    protected $table='usuario';

    public $timestamps = false;

    protected $primaryKey = 'id';
    protected $fillable = [
        'password','email'
    ];


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
