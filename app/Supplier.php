<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_nit',
        'razon_social',
        'descripcion',
        'user_id',
        'rep_nombre',
        'rep_nombre_2',
        'rep_apellido',
        'rep_apellido_2',
        'sitio_web',
        'telefono',
        'direccion',
        'ciudad',
        'calificacion'
    ];
    //

    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function stores(){
        return $this->hasMany('App\Store');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
