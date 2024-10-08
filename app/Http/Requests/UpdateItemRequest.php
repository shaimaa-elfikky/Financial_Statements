<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'code' => 'nullable|numeric',
            'follow_item_id' => 'nullable|integer',
            'calc_fl' => 'nullable',
            'analize_fl' => 'required|boolean',
            'show_fl' => 'required|boolean',
        ];
    }



    public function attributes()
    {
        return [
            'name' => __('keywords.name'),
            'code' => __('keywords.code'),
            'follow_item_id' => __('keywords.follow_item_id'),
            'calc_fl' => __('keywords.calc_fl'),
            'analize_fl' => __('keywords.analize_fl'),
            'show_fl' => __('keywords.show_fl'),
        ];
    }
}
