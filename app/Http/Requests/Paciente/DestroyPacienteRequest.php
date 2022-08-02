<?php

namespace App\Http\Requests\Paciente;

use Illuminate\Foundation\Http\FormRequest;

class DestroyPacienteRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required|exists:pacientes,id',
        ];
    }
}
