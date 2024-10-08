<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemAnalizeCompUpdateRequest extends FormRequest
{


    
    public function authorize()
    {
        return true;
    }



    public function rules()
    {
        return [
            'item_comp_prd_val_id'            => 'required|integer',
            'company_id'            => 'required|integer',
            'arbitrage_value'      => 'required|numeric|min:0|max:9999999999999.99',
            'initial_budget_value' =>  'required|numeric|min:0|max:9999999999999.99',
            'approved_budget_value' => 'required|numeric|min:0|max:9999999999999.99',
        ];
    }


    public function attributes()
    {
        return [
            'item_comp_prd_val_id' => __('keywords.item_comp_prd_val_id'),
            'company_id' => __('keywords.companies'),
            'arbitrage_value' => __('keywords.arbitrage_value'),
            'initial_budget_value' => __('keywords.initial_budget_value'),
            'approved_budget_value' => __('keywords.approved_budget_value'),
        ];
    }
}
