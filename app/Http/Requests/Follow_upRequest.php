<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class Follow_upRequest extends FormRequest
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
            'demand_id'=> 'required|max:3',
			'activist_id'=> 'required|max:3',
			'title'=> 'required|string|max:70',
			'detalis'=> 'required|string|max:255',
        ];
    }
}

