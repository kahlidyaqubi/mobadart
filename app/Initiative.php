<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Initiative extends Model
{
    //
    protected $table = "initiatives";
    protected $fillable =['admin_id','title','team_name','city_id'
        ,'neighborhood','details','Changing','justifications',
        'problem','main_goale','start_date','end_date','img','donation','paid_up'];

    public function activities(){
        return $this->hasMany('App\Activity');
    }
    public function donation_lists(){
        return $this->hasMany('App\DonationList');
    }
    public function interests()
    {
        return $this->belongsToMany('App\Interest');
    }
    function initiatives_interests(){
        return $this->hasMany('App\Initiatives_interest');
    }
    public function activists()
    {
        return $this->belongsToMany('App\Activist');
    }
    public function demands(){
        return $this->hasMany('App\Demand');
    }
    public function articles(){
        return $this->hasMany('App\Article');
    }

    public function initiatives_goals(){
        return $this->hasMany('App\Initiatives_goal');
    }

    function initiative_evaluation(){
        return $this->hasMany('App\Initiative_evaluation');
    }

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }

    public function city(){
        return $this->belongsTo('App\City');
    }
}
