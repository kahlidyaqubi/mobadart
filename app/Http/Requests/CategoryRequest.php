<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class CategoryRequest extends FormRequest
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
        $id= $this->route('categoryDemand');
        if($id==null)
        $id= $this->route('categoryArticle');

		return [
            'name'=> 'required|string|max:50',
            'name'=> Rule::unique('categories')->where(function ($query) use($id) {
                return $query->where('name', request()->name)->where('id','!=', $id)
                    ->where('type',request()->type);
            }),
			'type'=> 'max:1',
        ];
    }
}

