<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemCompPrdValStoreRequest extends FormRequest
{





    public function authorize()
    {
        return true;
    }




    public function rules()
    {
        return [
            'data'                        => 'required|array',
            'data.*.item_id'              => 'required|integer',
            'data.*.period_id'            => 'required|integer',
            'data.*.company_id'            => 'required|integer',
            'data.*.arbitrage_value'      => 'required|numeric|min:0|max:9999999999999.99',
            'data.*.initial_budget_value' =>  'required|numeric|min:0|max:9999999999999.99',
            'data.*.approved_budget_value' => 'required|numeric|min:0|max:9999999999999.99',
        ];
    }



    public function attributes()
    {
        return [
            'data.*.item_id' => __('keywords.items'),
            'data.*.period_id' => __('keywords.periods'),
            'data.*.company_id' => __('keywords.companies'),
            'data.*.arbitrage_value' => __('keywords.arbitrage_value'),
            'data.*.initial_budget_value' => __('keywords.initial_budget_value'),
            'data.*.approved_budget_value' => __('keywords.approved_budget_value'),
        ];
    }
}
