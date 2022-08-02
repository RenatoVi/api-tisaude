<?php

namespace App\Http\Requests\Especialidade;

use Illuminate\Foundation\Http\FormRequest;

class DestroyEspecialidadeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required|exists:especialidades,id',
        ];
    }
}
