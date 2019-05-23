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
        $id = $this->route('family_center');
        $valid = [
            'name'=> 'required|string|max:255|unique:family_centers,name,' . $id . ',id',
			'city_id'=> 'required|max:3',
            'governorate_id'=> 'required|max:3',
			'manager_id'=> 'max:3',
			'manager_name'=> 'required|string|max:255',
        ];

        if (request()->mobile)
            $valid['mobile'] = 'numeric|min:6|max:10';

        return $valid;
    }
}

