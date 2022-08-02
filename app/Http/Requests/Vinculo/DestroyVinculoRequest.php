<?php

namespace App\Http\Requests\Vinculo;

use Illuminate\Foundation\Http\FormRequest;

class DestroyVinculoRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required|exists:vinculos,id',
        ];
    }
}
