<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class Initiative_evaluation_towRequest extends FormRequest
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
        request()['attributes']=array_filter(request()['attributes']);
        request()['values']=array_filter(request()['values']);
        request()['attributes']=array_values(request()['attributes']);
        request()['values']=array_values(request()['values']);
        return [
            'initiative_id' => 'required|max:2',
            'attributes'=> 'required',
            'values'=> 'required',
        ];
    }
}

