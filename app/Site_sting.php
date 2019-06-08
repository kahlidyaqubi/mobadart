<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site_sting extends Model
{
    //
    protected $table = "site_sting";
    protected $fillable =['title_page','project_title','about_project','img1','who_are','img2'
        ,'motivational_words','img3','experiences','address'
        ,'mobile1','mobile2','bank_account','accession_msg','acceptance_msg'
        ,'donation_msg'];
}
