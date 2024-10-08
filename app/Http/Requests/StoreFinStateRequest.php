<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFinStateRequest extends FormRequest
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
            'name' => 'required|string|unique:fin_stat,name|max:255',
            'code' => 'required|string|max:255',
            'fin_stat_type' => 'required |integer',

        ];
    }



    public function attributes()
    {
        return [
            'name' => __('keywords.name'),
            'code' => __('keywords.code'),
            'fin_stat_type' => __('keywords.fin_stat_type'),

        ];
    }
}
