<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RelatedItemRequestStore extends FormRequest
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

            'data'                   => 'required|array',
            'data.*.item_id'         => 'required|integer',
            'data.*.item_related_id' => 'required|integer',
            'data.*.add_subtrsct_fl' => 'required|boolean',
        ];
    }


    public function attributes()
    {
        return [
            
            'data.*.item_id' => __('keywords.items'),
            'data.*.item_related_id' => __('keywords.item_related_id'),
            'data.*.add_subtrsct_fl' => __('keywords.add_subtrsct_fl'),
        ];
    }

}
