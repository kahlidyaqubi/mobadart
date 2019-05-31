<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivistProfileRequest extends FormRequest
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
        Validator::extend('without_spaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });
        return [
            'name' => "required|max:50",
            'mobile' => 'numeric|required|digits_between:6,10',
            'email' => 'required|string|email',
            'last_name' => 'max:50',
            'city_id'=> 'required|max:3',
            'neighborhood'=> 'required|string|max:70',
            'brth_day'=> 'required|date',
            'user_name' => 'required|string|max:255|without_spaces|unique:users',

        ];
    }
}
