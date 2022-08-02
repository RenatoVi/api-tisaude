<?php

namespace App\Http\Requests\Vinculo;

use Illuminate\Foundation\Http\FormRequest;

class StoreVinculoRequest extends FormRequest
{
    public function rules()
    {
        return [
            'paciente' => 'required|exists:pacientes,id',
            'plano_saude' => 'required|exists:plano_saudes,id',
            'consulta' => 'required|exists:consultas,id',
            'contrato' => 'required',
        ];
    }
}
