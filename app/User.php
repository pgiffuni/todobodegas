<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'nombre',
        'nombre_2',
        'apellido',
        'apellido_2',
        'documento_tipo',
        'documento_ident',
        'direccion',
        'telefono'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function suppliers(){
        return $this->hasMany('App\Supplier');
    }
    public function role(){
        return $this->belongsTo('App\Role');
    }
 
    public function reserves(){
        return $this->belongsToMany('App\Reserve');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
