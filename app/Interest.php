<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    //
    protected $table = "interests";
    protected $fillable =['name','status'];


    public function activists()
    {
        return $this->belongsToMany('App\Activist');
    }
    public function initiatives()
    {
        return $this->belongsToMany('App\Initiative');
    }

}
