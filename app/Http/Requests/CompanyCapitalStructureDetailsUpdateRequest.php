<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyCapitalStructureDetailsUpdateRequest extends FormRequest
{



    public function authorize()
    {
        return true;
    }



    public function rules()
    {
        return [

            'comp_cap_struct_id' => 'required|integer',
            'invest_company_id'  => 'required|numeric',
            'invest_stock_num'   => 'required|numeric',
            'invest_stock_val'   => 'required|numeric',
            'minority_fl'        => 'required|boolean'
        ];
    }


    public function validated()
    {

        $validatedData = parent::validated();

        unset($validatedData['id']);
        unset($validatedData['company_id']);

        return $validatedData;
    }

    public function attributes()
    {
        return [
            'data.*.comp_cap_struct_id' => __('keywords.comp_cap_struct_id'),
            'data.*.invest_company_id' => __('keywords.invest_company_id'),
            'data.*.invest_stock_num' => __('keywords.invest_stock_num'),
            'data.*.invest_stock_val' => __('keywords.invest_stock_val'),
            'data.*.minority_fl' => __('keywords.minority_fl'),
        ];
    }
}
