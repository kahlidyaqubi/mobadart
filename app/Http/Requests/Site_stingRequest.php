<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class Site_stingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'about_project'=> 'required|string|max:255',
			'motivational_words'=> 'required|string|max:255',
			'who_are'=> 'required|string|max:255',
			'maan_msg'=> 'required|string|max:255',
			'call_us'=> 'required|string|max:255',
			'donation_msg'=> 'required|string|max:255',
			'complaint_msg'=> 'required|string|max:255',
			'proposal_msg'=> 'required|string|max:255',
			'recommendation_msg'=> 'required|string|max:255',
			'accession_msg'=> 'required|string|max:255',
			'acceptance_msg'=> 'required|string|max:255',
			'rejection_msg'=> 'required|string|max:255',
			'contact_msg'=> 'required|string|max:255',
            'mobile1'=> 'required|string|min:6|max:10',
			'bank_account'=> 'required|number|min:4|max:21',
            'experiences'=> 'required|string|max:255',
			'mobile2'=> 'required|string|min:6|max:10',
			'mobile3'=> 'required|string|min:6|max:10',
            'img1'=> 'required|string|max:255',
            'img2'=> 'required|string|max:255',
            'img3'=> 'required|string|max:255',
        ];
    }
}

