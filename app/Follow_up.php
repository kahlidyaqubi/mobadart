<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow_up extends Model
{
    //
    protected $table = "follows_up";
    protected $fillable = ['demand_id', 'activist_id', 'detalis'
    ];

    public function activist()
    {
        return $this->belongsTo('App\Activist');
    }

    public function demand()
    {
        return $this->belongsTo('App\Demand');
    }
}
