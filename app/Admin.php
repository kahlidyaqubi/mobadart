<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    
    protected $table = "admins";
    protected $primaryKey='id';
    protected $fillable =['user_id','family_center_id','is_cor','mobile','super_admin'];

    function user(){
        return $this->hasOne('App\User','id','user_id');
    }
    function demands()
    {
        return $this->hasMany('App\Demand');
    }
    public function Family_center(){
        return $this->belongsTo('App\Family_center');
    }

    function his_family_center(){
        return $this->hasOne('App\Family_center','id','manager_id');
    }
    public function links()
    {
        return $this->belongsToMany('App\Link');
    }
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
    function articles(){
        return $this->hasMany('App\Article');
    }

    function initiatives(){
        return $this->hasMany('App\Initiative');
    }
    function replies(){
        return $this->hasMany('App\Reply');
    }
}
