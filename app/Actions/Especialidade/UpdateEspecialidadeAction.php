<?php

namespace App\Actions\Especialidade;

use App\Models\Especialidade;

class UpdateEspecialidadeAction
{
    public function run(Especialidade $especialidade, array $data): Especialidade
    {
        $especialidade->fill($data);
        $especialidade->save();
        return $especialidade;
    }
}
