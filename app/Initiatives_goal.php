<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Initiatives_goal extends Model
{
    //
    protected $table = "initiatives_goals";
    protected $fillable =['initiative_id','details'];

    public function initiativ(){
        return $this->belongsTo('App\Initiative');
    }
}
