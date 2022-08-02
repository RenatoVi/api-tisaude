<?php

namespace App\Http\Requests\PlanoSaude;

use Illuminate\Foundation\Http\FormRequest;

class StorePlanoSaudeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'descricao' => 'required|string|max:255',
            'telefone' => 'required|string|max:255',
        ];
    }
}
