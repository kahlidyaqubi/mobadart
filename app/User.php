<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','father_name','grand_father_name', 'password','lang','last_name','user_name','the_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function notifications()
    {
        return $this->hasMany('App\Notification');
    }
    function admin(){
        return $this->belongsTo('App\Admin','id','user_id');
    }
    function activist(){
        return $this->belongsTo('App\Activist','id','user_id');
    }
}
