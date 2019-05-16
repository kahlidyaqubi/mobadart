<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table = "articles";
    protected $fillable = ['initiative_id','status', 'admin_id', 'category_id', 'title'
        , 'detalis', 'the_file', 'img'];

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function initiativ(){
        return $this->belongsTo('App\Initiative');
    }
    function comments(){
        return $this->hasMany('App\Comment');
    }
}
