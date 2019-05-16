<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class CommentRequest extends FormRequest
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
            'article_id'=> 'required|max:3',
			'activist_id'=> 'max:3',
			'writer'=> 'string|max:50',
			'title'=> 'required|string|max:70',
			'detalis'=> 'required|string|max:255',
        ];
    }
}

