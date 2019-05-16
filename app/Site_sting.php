<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site_sting extends Model
{
    //
    protected $table = "site_sting";
    protected $fillable =['about_project','motivational_words','who_are','experiences','maan_msg','call_us'
        ,'donation_msg','complaint_msg','proposal_msg','recommendation_msg'
        ,'accession_msg','acceptance_msg','rejection_msg','contact_msg','bank_account'
        ,'mobile1','mobile2','mobile3','img1','img2','img3'];
}
