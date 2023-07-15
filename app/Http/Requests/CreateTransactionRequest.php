<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTransactionRequest extends FormRequest {

    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'value' => 'required|numeric|gte:0.01',
            'payer' => 'required',
            'payee' => 'required'
        ];
    }

    public function messages(): array {
        return [
            'value.required' => 'value is required',
            'value.numeric' => 'the value must be a number',
            'value.gte' => 'the value must be a number greater than or equal to 0.01',
        ];
    }
}
