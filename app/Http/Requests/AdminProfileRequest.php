<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
        $valid= [
            'name' => "required|max:50",
            'email' => 'required|email|max:30',
            'email' => Rule::unique('users')->where(function ($query) use ($id) {
                return $query->where('email', request()->name)->where('id', '!=', $id)
                    ->where('the_type', request()->type);
            }),
            'last_name' => 'max:50',
            'user_name' => 'required|max:30|without_spaces',
            'user_name' => Rule::unique('users')->where(function ($query) use ($id) {
                return $query->where('user_name', request()->name)->where('id', '!=', $id)
                    ->where('the_type', request()->type);
            }),
        ];
		
        if (request()->mobile)
            $valid['mobile'] = 'numeric|digits_between:6,10';
        return $valid;
    }
}
