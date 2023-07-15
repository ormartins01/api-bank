<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{

    public function authorize(): bool {
        return true;
    }


    public function rules(): array {
        return [
            'email' => 'required|email',
            'name' => 'required',
            'cpf' => 'required|min:11|max:11',
            'password' => 'required|min:8|regex:/[a-zA-Z#$%^&*]/i'
        ];
    }
}
