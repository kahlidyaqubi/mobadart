<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    //
    protected $table = "demands";
    protected $fillable =['initiative_id','status','admin_id','activist_id','title','category_id'
        ,'detalis','the_file'];

    public function activist()
    {
        return $this->belongsTo('App\Activist');
    }
    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }
    function follows_up(){
        return $this->hasMany('App\Follow_up');
    }
    function replies(){
        return $this->hasMany('App\Reply');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function initiativ(){
        return $this->belongsTo('App\Initiative');
    }

}
