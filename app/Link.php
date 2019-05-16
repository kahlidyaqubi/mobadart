<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    //
    protected $table = "links";
    protected $fillable =['title','order_id','icon','link'
        ,'super','in_menu','new_window','route','parent_id'];

    public function admins()
    {
        return $this->belongsToMany('App\Admin');
    }
}
