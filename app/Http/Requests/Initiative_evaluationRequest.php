<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class Initiative_evaluationRequest extends FormRequest
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
            'initiative_id' => 'required|max:2',
            'changing'=> 'required|max:2',
            'changing_ditalis'=> 'required|max:600',
            'impacting'=> 'required|max:2',
            'impacting_ditalis'=> 'required|max:600',
            'continuing'=> 'required|max:2',
            'continuing_ditalis'=> 'required|max:600',
            'improving'=> 'required|max:2',
            'improving_ditalis'=> 'required|max:600',
        ];
    }
}

