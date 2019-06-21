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
        if (auth()->user()) {
            return [
                'detalis' => 'required|string|max:255',
                'article_id' => 'required|string|max:255',
            ];
        } else {
            return [
                'writer' => 'string|max:50',
                'email' => 'required|string|max:70',
                'detalis' => 'required|string|max:255',
                'article_id' => 'required|string|max:255',
            ];
        }

    }
}

