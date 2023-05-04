<?php

namespace Modules\Cart\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeCartItemRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'quantity' => 'required|integer|min:1',
            'product_id' => 'required|exists:carts_products,product_id',
        ];
    }

    public function messages(): array
    {
        return [
            'product_id.required' => 'product is required',
            'product_id.exists' => 'product is not found',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
