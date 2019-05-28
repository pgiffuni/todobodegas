<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre_ref',
        'fecha_inicio',
        'fecha_fin',
        'descripcion',
        'store_id'
    ];

    /**
     * Schedules are only the available times for storage.
     * The are not meant to be assigned to any reserve. 
     */
    
    public function store(){
        return $this->belongsTo('App\Store');
    }
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
