<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Initiative_evaluation extends Model
{
    //
    protected $table = "initiative_evaluation";
    protected $fillable =['initiative_id','activist_id','admin_id',
        'changing','changing_ditalis','impacting',
        'impacting_ditalis','continuing','continuing_ditalis',
        'improving','improving_ditalis'];

    public function activist()
    {
        return $this->belongsTo('App\Activist');
    }
    function admin(){
        return $this->belongsTo('App\Admin');
    }
    public function initiative()
    {
        return $this->belongsTo('App\Initiative');
    }
    public function evaluation_others(){
        return $this->hasMany('App\Evaluation_other');
    }
}
