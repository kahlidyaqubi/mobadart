<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
		    'name' => 'max:50',
            'title' => 'required|max:50',
            'email' => 'max:50|email',
            'content' => 'required|max:300',
            'mopile' => 'max:12|min:6',
			
        ];
    }
}
