<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RelatedItemRequestUpdate extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [


            'item_id'         => 'required|integer',
            'item_related_id' => 'required|integer',
            'add_subtrsct_fl' => 'required|boolean',
        ];
    }


    public function attributes()
    {
        return [
            
            'item_id' => __('keywords.items'),
            'item_related_id' => __('keywords.item_related_id'),
            'add_subtrsct_fl' => __('keywords.add_subtrsct_fl'),

        ];
    }
}
