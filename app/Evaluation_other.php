<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation_other extends Model
{
    //
    protected $table = "evaluation_others";
    protected $fillable =['initiative_evaluation_id','attribute','value'];

    public function initiative_evaluation()
    {
        return $this->belongsTo('App\Initiative_evaluation');
    }
}
