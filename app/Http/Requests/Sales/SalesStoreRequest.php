<?php

namespace App\Http\Requests\Sales;

use Illuminate\Foundation\Http\FormRequest;

class SalesStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            '*.product_id' => 'required|exists:products,id',
            '*.amount'     => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            '*.product_id.required' => __('sales.product_id_required'),
            '*.product_id.exists' => __('sales.product_id_exists'),
            '*.amount.required' => __('sales.amount_required'),
            '*.amount.integer' => __('sales.amount_integer'),
        ];
    }
}
