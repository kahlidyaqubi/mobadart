<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = "categories";
    protected $fillable =['name','type'];

    public function demands(){
        return $this->hasMany('App\Demand');
    }

    public function articles(){
        return $this->hasMany('App\Article');
    }
    public function admins()
    {
        return $this->belongsToMany('App\Admin');
    }
}
