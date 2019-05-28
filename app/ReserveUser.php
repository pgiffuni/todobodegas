<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReserveUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reserve_id',
        'user_id'
    ];
    //
}
