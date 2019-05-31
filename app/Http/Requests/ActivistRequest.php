<?php

namespace App\Http\Requests;

use App\Activist;
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
        Validator::extend('without_spaces', function ($attr, $value) {
            return preg_match('/^\S*$/u', $value);
        });
        $id_activsit = $this->route('activsit');
        if($id_activsit=='')
            $id='';
        else
        $id = Activist::find($id_activsit)->user->id;

        $valid = [

            'name' => 'required|max:30',
            'father_name' => 'required|max:30',
            'grand_father_name' => 'required|max:30',
            'last_name'=> 'required|max:30',
            'ido'=>'required|min:9|max:9|unique:activists,ido,' . $id_activsit . ',id',
            'user_name' => 'required|max:30|without_spaces|unique:users,user_name,' . $id . ',id',
            'email' => 'required|email|max:30|unique:users,email,' . $id . ',id',
            'city_id'=> 'required|max:3',
			'neighborhood'=> 'required|string|max:70',
			'brth_day'=> 'required|date',
			'gender'=> 'required|string|max:1',
            'governorate_id'=> 'required|max:3',
        ];
        if (request()->mobile)
            $valid['mobile'] = 'numeric|digits_between:6,10';
        return $valid;
    }
}

