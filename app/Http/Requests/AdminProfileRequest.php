<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class AdminProfileRequest extends FormRequest
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
        $id = auth()->user()->id;
        return [
            'name' => "required|max:50",
            'mobile' => 'required|max:50',
            'email' => 'required|string|email|unique:users,email,'.$id.',id',
            'last_name' => 'max:50',
            'user_name' => 'required|string|max:255|without_spaces|unique:users,user_name,'.$id.',id',

        ];
    }
}
