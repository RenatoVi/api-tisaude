<?php

namespace App\Http\Requests\Consulta;

use Illuminate\Foundation\Http\FormRequest;

class DestroyConsultaRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required|exists:consultas,id',
        ];
    }
}
