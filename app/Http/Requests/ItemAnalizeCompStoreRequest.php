<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemAnalizeCompStoreRequest extends FormRequest
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

            'data'                        => 'required|array',
            'data.*.item_comp_prd_val_id'            => 'required|integer',
            'data.*.company_id'            => 'required|integer',
            'data.*.arbitrage_value'      => 'required|numeric|min:0|max:9999999999999.99',
            'data.*.initial_budget_value' =>  'required|numeric|min:0|max:9999999999999.99',
            'data.*.approved_budget_value' => 'required|numeric|min:0|max:9999999999999.99',
        ];
    }


    public function attributes()
    {
        return [
            'data.*.item_comp_prd_val_id' => __('keywords.item_comp_prd_val_id'),
            'data.*.company_id' => __('keywords.companies'),
            'data.*.arbitrage_value' => __('keywords.arbitrage_value'),
            'data.*.initial_budget_value' => __('keywords.initial_budget_value'),
            'data.*.approved_budget_value' => __('keywords.approved_budget_value'),
        ];
    }
}
