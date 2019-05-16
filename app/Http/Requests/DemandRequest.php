<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class DemandRequest extends FormRequest
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
            'initiative_id'=> 'required|max:3',
			'activist_id'=> 'max:3',
            'admin_id'=> 'max:3',
			'title'=> 'required|string|max:70',
			'category_id'=> 'required|max:3',
			'detalis'=> 'required|string|max:255',
			'the_file'=> 'required|string|max:255',
        ];
    }
}

