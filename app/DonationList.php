<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonationList extends Model
{
    //
    protected $table = 'donation_lists';

    protected $fillable = ['initiative_id', 'bank_account', 'financier_name', 'brth_day',
        'amount', 'financier_phone', 'financier_email', 'city_id','financier_address','country' ,'accept_amount'
    ];



    public function initiative(){
        return $this->belongsTo('App\Initiative');
    }
    public function city()
    {
        return $this->belongsTo('App\City');
    }

}
