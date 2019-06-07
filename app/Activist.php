<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activist extends Model
{
    //
    protected $table = 'activists';

    protected $fillable = ['user_id', 'ido' ,'shared','shared_ditalis','city_id', 'neighborhood', 'brth_day',
        'mobile', 'gender','face_url'
    ];

    function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    function follows_up()
    {
        return $this->hasMany('App\Follow_up');
    }

    function initiative_evaluations()
    {
        return $this->hasMany('App\Initiative_evaluation');
    }

    function comments()
    {
        return $this->hasMany('App\Comment');
    }

    function demands()
    {
        return $this->hasMany('App\Demand');
    }

    function activists_interests()
    {
        return $this->hasMany('App\Activists_interest');
    }

    public function initiatives()
    {
        return $this->belongsToMany('App\Initiative','activists_initiatives');
    }

    public function interests()
    {
        return $this->belongsToMany('App\Interest','activists_interests');
    }

    function activists_initiatives()
    {
        return $this->hasMany('App\Activists_initiative');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
