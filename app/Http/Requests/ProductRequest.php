<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|string',
            'sku' => 'integer|nullable', // Cambiado de bigint a integer
            'description' => 'string|nullable',
            'description_small' => 'string|nullable',
            'code_currency_default' => 'string|nullable',
            'views' => 'integer|nullable',
            'sale_price ' => 'double|nullable',
            'weight' => 'decimal',
            'height' => 'decimal|nullable',
            'width' => 'decimal|nullable',
            'images'=>'nullable',
            'length' => 'numeric|nullable',
            'brand_id' => 'numeric|nullable',
            'model_id' => 'numeric|nullable',
            'unit_id' => 'numeric|nullable',
            'created_at' => 'datetime|nullable',
            'updated_at' => 'datetime|nullable',
            'category_id' => 'required',
            'profit_margin_percentage' => 'numeric|nullable',
            'profit_amount' => 'numeric|nullable',
            'supported_currencies' => 'array', // lista de monedas seleccionadas
            'supported_currencies.*' => 'exists:country_currencies,id', // cada ID debe existir en la tabla





        ];
    }
}
