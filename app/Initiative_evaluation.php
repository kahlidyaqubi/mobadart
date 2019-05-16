<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Initiative_evaluation extends Model
{
    //
    protected $table = "initiative_evaluation";
    protected $fillable =['initiative_id','activist_id'];

    public function activist()
    {
        return $this->belongsTo('App\Activist');
    }
    public function initiative()
    {
        return $this->belongsTo('App\Initiative');
    }
}
