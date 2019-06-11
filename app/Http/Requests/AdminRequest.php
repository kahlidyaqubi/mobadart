<?php

namespace App\Http\Requests;

use App\Admin;
use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
        Validator::extend('without_spaces', function ($attr, $value) {
            return preg_match('/^\S*$/u', $value);
        });
        $id_admin = $this->route('admin');
        if($id_admin=='')
            $id='';
        else
        $id = Admin::find($id_admin)->user->id;
        $valid = [
            //'user_id'=> 'required|max:3',
            'name' => 'required|max:30',
            'user_name' => 'required|max:30|without_spaces',
            'user_name' => Rule::unique('users')->where(function ($query) use ($id) {
                return $query->where('user_name', request()->name)->where('id', '!=', $id)
                    ->where('the_type', request()->type);
            }),
            'email' => 'required|email|max:30',
            'email' => Rule::unique('users')->where(function ($query) use ($id) {
                return $query->where('email', request()->name)->where('id', '!=', $id)
                    ->where('the_type', request()->type);
            }),
            'family_center_id' => 'max:3',
            'is_cor' => 'max:1',
            'super_admin' => 'required|max:1',
        ];
        if (request()->mobile)
            $valid['mobile'] = 'numeric|digits_between:6,10';
         return $valid;
    }
}

