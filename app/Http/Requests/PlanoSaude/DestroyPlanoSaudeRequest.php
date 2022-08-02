<?php

namespace App\Http\Requests\PlanoSaude;

use Illuminate\Foundation\Http\FormRequest;

class DestroyPlanoSaudeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required|exists:plano_saudes,id',
        ];
    }
}
