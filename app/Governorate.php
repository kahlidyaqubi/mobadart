<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    //
    protected $table = "governorates";
    protected $fillable = ['name'];

    function cities()
    {
        return $this->hasMany('App\City');
    }
}
