<?php

namespace App\Http\Requests\Consulta;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConsultaRequest extends FormRequest
{
    public function rules()
    {
        return [
            'data' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'particular' => 'required|boolean',
        ];
    }
}
