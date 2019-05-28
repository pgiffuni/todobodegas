<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'area_requerida',
        'user_id',
        'fecha_inicio',
        'fecha_fin'
    ];
 
    //
    public function schedules(){
        return $this->hasMany('App\Schedule');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
