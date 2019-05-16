<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationListsRequest extends FormRequest
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
            'initiative_id' => "required|max:3",
            'city_id' => "required|max:3",
            'bank_account' => 'required|number|max:50',
            'financier_name' => 'required|string|email',
            'amount' => 'required|number|max:50',
            'financier_phone'=> 'required|min:6|max:10',
            'financier_email'=> 'required|email|string|max:70',
            'financier_address'=> 'required|string|max:70',
            'status' => 'required|string|max:255|without_spaces|unique:users',

        ];
    }
}
