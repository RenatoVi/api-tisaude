<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutenticateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'password' => 'required|string',
            'email' => 'required|string|email',
        ];
    }

    public function messages(): array
    {
        return [
            'password.required' => 'O campo senha é obrigatório',
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'O campo email deve ser um email válido',
        ];
    }
}
