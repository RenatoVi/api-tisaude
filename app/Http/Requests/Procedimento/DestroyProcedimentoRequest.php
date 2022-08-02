<?php

namespace App\Http\Requests\Procedimento;

use Illuminate\Foundation\Http\FormRequest;

class DestroyProcedimentoRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required|exists:procedimentos,id',
        ];
    }
}
