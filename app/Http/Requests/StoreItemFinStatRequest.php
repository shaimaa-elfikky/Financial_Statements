<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemFinStatRequest extends FormRequest
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
            'fin_stat_id' => ['required','exists:fin_stat,id'],
            'item_id' => ['required', 'exists:item,id'],
        ];
    }



    public function attributes()
    {
        return [
            'fin_stat_id' => __('keywords.fin_stat_id'),
            'item_id' => __('keywords.item_id'),
           

        ];
    }
}
