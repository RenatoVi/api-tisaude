<?php

namespace App\Http\Requests\Medico;

use Illuminate\Foundation\Http\FormRequest;

class DestroyMedicoRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required|exists:medicos,id',
        ];
    }
}
