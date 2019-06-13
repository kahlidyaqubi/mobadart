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
            //$site_bank_account
            'initiative_id' => "required|max:3",
            'bank_account' => 'required|numeric|digits_between:4,16',//
            'financier_name' => 'required|string',//
            'amount' => 'required|numeric|digits_between:2,16',//
            'financier_email'=> 'required|email|string|max:70',//
            'financier_phone'=> 'required|numeric|digits_between:6,10',//
            'country'=> "required|max:30",
            'financier_address'=> 'required|string|max:70',//
            // 'city_id' => "required|max:3",
            //'status' => 'required|string|max:255|without_spaces|unique:users',

        ];
    }
}
