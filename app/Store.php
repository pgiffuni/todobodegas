<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre_bodega',
        'direccion_bodega',
        'area_bodega',
        'telefono_bodega',
        'costo_por_metro',
        'condiciones_especificas',
        'supplier_id'
    ];

    //

    public function supplier(){
        return $this->belongsTo('App\Supplier');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function schedules(){
        return $this->hasMany('App\Schedule');
    }
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
