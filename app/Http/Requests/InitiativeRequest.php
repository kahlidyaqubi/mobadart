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
        $id = $this->route('initiative');
        $valid = [
            'title'=> 'required|string|max:70|unique:initiatives,title,' . $id . ',id',
			'team_name'=> 'required|string|max:70',
			'city_id'=> 'required|max:3',
            'activists_count'=>'required|max:3',
			'neighborhood'=> 'required|string|max:70',
            'governorate_id'=> 'required|max:3',
			'details'=> 'required|string|max:400',
			'changing'=> 'required|string|max:400',
			'justifications'=> 'required|string|max:400',
			'problem'=> 'required|string|max:400',
			'main_goale'=> 'required|string|max:400',
            'paid_up'=>'max:6',
			'start_date'=> 'required|date',
			'end_date'=> 'required|date',
        ];
        if (request()->mobile)
            $valid['donation'] = 'max:6';
        if (request()->image)
            $valid['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        return $valid;
    }
}

