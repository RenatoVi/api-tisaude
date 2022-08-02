<?php

namespace App\Actions\Especialidade;

use App\Models\Especialidade;

class CreateEspecialidadeAction
{
    public function run(array $data): Especialidade
    {
        return Especialidade::query()->create($data);
    }
}
