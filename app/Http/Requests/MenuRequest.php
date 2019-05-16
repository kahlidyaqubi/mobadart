<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class MenuRequest extends FormRequest
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
            'title'=> 'required|string|max:255',
			'order_id'=> 'required|max:3',
			'icon'=> 'required|string|max:255',
			'link'=> 'required|string|max:255',
			'in_top'=> 'required|max:1',
			'in_login'=> 'required|max:1',
            'in_guest'=> 'required|max:1',
			'in_menu'=> 'required|max:1',
			'new_window'=> 'required|max:1',
			'route'=> 'required|string|max:255',
			'parent_id'=> 'required|max:3',
        ];
    }
}

