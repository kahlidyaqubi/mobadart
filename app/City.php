<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $table = "cities";
    protected $fillable =['governorate_id','name'];

    public function activists(){
        return $this->hasMany('App\Activist');
    }
    public function donation_lists(){
        return $this->hasMany('App\DonationList');
    }
    public function governorate()
    {
        return $this->belongsTo('App\Governorate');
    }
    public function family_centers(){
        return $this->hasMany('App\Family_center');
    }

    public function initiatives(){
        return $this->hasMany('App\Initiative');
    }
}
