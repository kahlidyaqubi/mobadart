<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family_center extends Model
{
    //
    protected $table = "family_centers";
    protected $fillable =['name','city_id','manager_id','manager_name'
        ,'mobile'];

    function manegar(){
        return $this->belongsTo('App\Admin','id','manager_id');
    }
    public function admins(){
        return $this->hasMany('App\Admin');
    }

    public function city(){
        return $this->belongsTo('App\City');
    }
}
