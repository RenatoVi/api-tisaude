<?php

namespace App\Http\Requests\Procedimento;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProcedimentoRequest extends FormRequest
{
    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'valor' => 'required|numeric',
        ];
    }
}
