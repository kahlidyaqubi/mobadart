<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    protected $table='activities';

    protected $fillable=['initiative_id','target_group','start_date'
        ,'name','count','ativiests_count'
    ];
    public function initiativ(){
        return $this->belongsTo('App\Initiative');
    }
}
