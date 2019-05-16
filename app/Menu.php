<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table = "menus";
    protected $fillable =['title','order_id','icon','link'
        ,'in_top','in_login','in_menu','new_window','route','parent_id'];
}
