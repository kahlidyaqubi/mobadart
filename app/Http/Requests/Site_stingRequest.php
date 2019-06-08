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
        $valid = [
            'title_page'=> 'required|string|max:50',
			'project_title'=> 'required|string|max:70',
			'about_project'=> 'required|string|max:500',
			'who_are'=> 'required|string|max:500',
			'motivational_words'=> 'required|string|max:100',
			'experiences'=> 'required|string|max:500',
			'address'=> 'required|string|max:255',
            'email'=>'required|email|max:255',
			'mobile1'=> 'required|numeric|digits_between:6,10',
			'mobile2'=> 'required|numeric|digits_between:6,10',
			'bank_account'=> 'required|numeric|digits_between:4,15',
            'accession_msg'=> 'required|string|min:10|max:70',
			'acceptance_msg'=> 'required|string|min:10|max:70',
            'donation_msg'=> 'required|string|min:10|max:70',
        ];
        if (request()->the_img1)
            $valid['the_img1'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=890,min_height=500';
        if (request()->the_img2)
            $valid['the_img2'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        if (request()->the_img3)
            $valid['the_img3'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        return $valid;
    }
}

