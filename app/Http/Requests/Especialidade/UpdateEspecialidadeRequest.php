<?php

namespace App\Http\Requests\Especialidade;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEspecialidadeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
        ];
    }
}
