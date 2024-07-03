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
            // 'category_id' => ['required', 'integer', 'exists:categories,id'],
            // 'merchant_account_id' => ['required', 'integer', 'exists:merchant_accounts,id'],

            'category_id' => ['required', 'integer'],
            'merchant_account_id' => ['required', 'integer'],
            
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'price' => ['required', 'integer', 'min:1'],
            'weight' => ['required', 'integer', 'min:1'],
            'stock' => ['sometimes', 'integer', 'min:1'],
        ];
    }
}
