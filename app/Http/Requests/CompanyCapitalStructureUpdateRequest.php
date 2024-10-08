<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyCapitalStructureUpdateRequest extends FormRequest
{



    public function authorize()
    {
        return true;
    }





    public function rules()
    {
        return [
            'company_id' => 'required|integer',
            'apply_date' => 'required|date',
            'total_stock_num' => 'required|numeric',
            'total_stock_val' => 'required|numeric',
        ];
    }

    public function attributes()
    {
        return [
            'company_id' => __('keywords.company_id'),
            'apply_date' => __('keywords.apply_date'),
            'total_stock_num' => __('keywords.total_stock_num'),
            'total_stock_val' => __('keywords.total_stock_val'),

        ];
    }


}
