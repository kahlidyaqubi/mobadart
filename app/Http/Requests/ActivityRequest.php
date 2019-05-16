<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class ActivityRequest extends FormRequest
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
    public function rules(){
	
        return [
            'initiative_id'=> 'required|max:3',
			'target_group'=> 'required|string|max:70',
			'start_date'=> 'required|date',
			'end_date'=> 'required|date',
			'count'=> 'required|max:4',
			'ativiests_count'=> 'required|max:3',
        ];
    }
}

