<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class ArticleRequest extends FormRequest
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
        $id = $this->route('article');
        $valid = [
            'category_id' => 'required|max:3',
            'title' => 'required|string|max:70|unique:articles,title,' . $id . ',id',
            'detalis' => 'required|string|max:400',
            'the_file' => 'required|string|max:255',

        ];

        if (request()->images) {
           $valid['images.*'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }
        if ($id =='')
            $valid['main_image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        if (request()->main_image)
            $valid['main_image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        return $valid;
    }
}

