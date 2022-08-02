<?php

namespace App\Http\Requests\Medico;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMedicoRequest extends FormRequest
{
    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'crm' => 'required|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'nome' => 'nome',
            'crm' => 'crm',
        ];
    }
}
