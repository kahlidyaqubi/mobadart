<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Initiatives_interest extends Model
{
    protected $table = "initiatives_interests";
    protected $fillable =['interest_id','initiative_id'];

    public function initiative()
    {
        return $this->belongsTo('App\Initiative');
    }
    public function interest()
    {
        return $this->belongsTo('App\Interest');
    }
}