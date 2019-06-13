<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';

    public function accounts(){
        return $this->hasMany(Account::class);
    }

    
    protected $fillable = [
        'name', 'iso2','photo','status'
    ];
    public function cities(){
        return $this->hasMany(City::class);
    }
}
