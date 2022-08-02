<?php

namespace App\Actions\Procedimento;

use App\Models\Procedimento;

class CreateProcedimentoAction
{
    public function run(array $data): Procedimento
    {
        return Procedimento::query()->create($data);
    }
}
