<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class ActivistRequest extends FormRequest
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
            //'user_id'=> 'required|max:3',
			'city_id'=> 'required|max:3',
			'neighborhood'=> 'required|string|max:70',
			'brth_day'=> 'required|date',
			'mobile'=> 'required|string|min:6|max:10',
			'gender'=> 'required|string|max:1',
        ];
    }
}

