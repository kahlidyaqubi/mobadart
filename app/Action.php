<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
	
	/**test**/
    protected $table = 'actions';

    protected $fillable = ['title', 'type' ,'zink'];
}
