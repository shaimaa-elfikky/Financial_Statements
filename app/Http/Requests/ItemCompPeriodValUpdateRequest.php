<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemCompPeriodValUpdateRequest extends FormRequest
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

            'item_id'              => 'required|integer',
            'period_id'            => 'required|integer',
            'company_id'            => 'required|integer',
            'arbitrage_value'      => 'required|numeric|min:0|max:9999999999999.99',
            'initial_budget_value' =>  'required|numeric|min:0|max:9999999999999.99',
            'approved_budget_value' => 'required|numeric|min:0|max:9999999999999.99',
        ];
    }



       public function attributes()
    {
        return [
            'item_id' => __('keywords.items'),
            'period_id' => __('keywords.periods'),
            'company_id' => __('keywords.companies'),
            'arbitrage_value' => __('keywords.arbitrage_value'),
            'initial_budget_value' => __('keywords.initial_budget_value'),
            'approved_budget_value' => __('keywords.approved_budget_value'),
        ];
    }
}
