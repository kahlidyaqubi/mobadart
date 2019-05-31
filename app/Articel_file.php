<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articel_file extends Model
{
    //
    protected $table = "article_files";
    protected $fillable =['article_id','name'];
    
    function articles(){
        return $this->belongsTo('App\Article');
    }
}
