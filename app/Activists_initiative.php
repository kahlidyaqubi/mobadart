<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activists_initiative extends Model
{
    //
    protected $table='activists_initiatives';

    protected $fillable=['initiative_id','activist_id','accept'
    ];

    public function activist()
    {
        return $this->belongsTo('App\Activist');
    }
    public function initiative()
    {
        return $this->belongsTo('App\Initiative');
    }
}
