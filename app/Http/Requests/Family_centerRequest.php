<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class Family_centerRequest extends FormRequest
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
            'name'=> 'required|string|max:255',
			'city_id'=> 'required|max:3',
			'manager_id'=> 'max:3',
			'manager_name'=> 'required|string|email|max:255',
			'mobile'=> 'required|string|min:6|max:10',
        ];
    }
}

