<?php

namespace App\Http\Requests\Vinculo;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVinculoRequest extends FormRequest
{
    public function rules()
    {
        return [
            'paciente_id' => 'required|exists:pacientes,id',
            'plano_saude_id' => 'required|exists:plano_saudes,id',
            'consulta_id' => 'required|exists:consultas,id',
            'contrato' => 'required|string|max:255',
        ];
    }
}
