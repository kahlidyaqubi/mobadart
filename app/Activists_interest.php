<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activists_interest extends Model
{
    protected $table='activists_interests';

    protected $fillable=['interest_id','activist_id'
    ];

    public function activist()
    {
        return $this->belongsTo('App\Activist');
    }
    public function interest()
    {
        return $this->belongsTo('App\Interest');
    }
}
