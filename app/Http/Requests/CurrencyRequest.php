<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Bank;

class CurrencyRequest extends FormRequest
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
            'bank_id' => 'required|integer',
            'currency_name' => 'required|max:255',
            'buy_rate' => 'required|max:255,',
            'sell_rate' => 'required|max:255,',
        ];
    }
}
