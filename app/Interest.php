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
        return $this->belongsToMany('App\Activist','activists_interests');
    }
    public function initiatives()
    {
        return $this->belongsToMany('App\Initiative','initiatives_interests');
    }
    function activists_interests()
    {
        return $this->hasMany('App\Activists_interest');
    }
    function initiatives_interests()
    {
        return $this->hasMany('App\Initiatives_interest');
    }

}
