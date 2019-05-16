<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activists_initiative extends Model
{
    //
    protected $table='activists_initiatives';

    protected $fillable=['initiative_id','activist_id'
    ];

    public function Activist()
    {
        return $this->belongsTo('App\activist');
    }
}
