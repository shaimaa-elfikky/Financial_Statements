<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
            'name' => 'required|string|unique:company,name|max:255',
            'code' => 'nullable|string|max:10',
            'address' => 'nullable|string',
            'aff_or_not' => 'nullable|boolean',
            'owner_or_not' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'email' => 'nullable|email',
            'telephone' => 'nullable|string',
            'web_site' =>'nullable|url',


        ];
    }


    public function attributes()
    {
        return [
            'name' => __('keywords.name'),
            'code' => __('keywords.code'),
            'address' => __('keywords.address'),
            'aff_or_not' => __('keywords.aff_or_not'),
            'owner_or_not' => __('keywords.owner_or_not'),
            'is_active' => __('keywords.is_active'),
            'email' => __('keywords.email'),
            'telephone' => __('keywords.telephone'),
            'web_site' => __('keywords.web_site'),

        ];
    }
}
