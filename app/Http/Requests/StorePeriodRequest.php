<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePeriodRequest extends FormRequest
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
            'date_from' => ['required', 'date', 'before:date_to'],
            'date_to' => ['required', 'date', 'after:date_from'],
            'fin_year' => ['required', 'integer'],
        ];
    }
    public function attributes()
    {
        return [
            'date_from' => __('keywords.date_from'),
            'date_to' => __('keywords.date_to'),
            'fin_year' => __('keywords.fin_year'),

        ];
    }
}
