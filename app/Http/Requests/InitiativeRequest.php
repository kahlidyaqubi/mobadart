<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class InitiativeRequest  extends FormRequest
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
            'admin_id'=> 'required|max:3',
			'title'=> 'required|string|max:70',
			'team_name'=> 'required|string|max:70',
			'city_id'=> 'required|max:3',
			'neighborhood'=> 'required|string|max:70',
			'details'=> 'required|string|max:255',
			'Changing'=> 'required|string|max:255',
			'justifications'=> 'required|string|max:255',
			'problem'=> 'required|string|max:255',
			'main_goale'=> 'required|string|max:255',
            'img'=>'string|max:255',
            'donation'=>'max:6',
            'paid_up'=>'max:6',
			'start_date'=> 'required|date',
			'end_date'=> 'required|date',
        ];
    }
}

