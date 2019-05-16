<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class AdminRequest extends FormRequest
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
			'family_center_id'=> 'required|max:3',
            'is_cor'=>'max:1',
			'mobile'=> 'string|min:6|max:10',
			'super_admin'=> 'max:1',
        ];
    }
}

