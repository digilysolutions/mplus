<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCurrencyPriceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'price_type' => 'string',
			'account_income' => 'string',
			'account_cost' => 'string',
			'account_tax' => 'string',
			'tax_account' => 'string',
			'price_category' => 'string',
			'concept' => 'string',
			'notes' => 'string',
        ];
    }
}
