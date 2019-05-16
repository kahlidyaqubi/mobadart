<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    protected $table = "replies";
    protected $fillable =['demand_id','admin_id','detalis'];

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }
    public function demand()
    {
        return $this->belongsTo('App\Demand');
    }

}
