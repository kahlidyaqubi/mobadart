<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = "comments";
    protected $fillable =['article_id','status','user_id','email','writer','detalis'];

    public function activist()
    {
        return $this->belongsTo('App\Activist');
    }
    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}
