<?php

namespace App\Actions\Medico;

use App\Models\Medico;

class CreateMedicoAction
{
    public function run(array $data): Medico
    {
        $medico = Medico::query()
            ->create($data);
        return $medico;
    }
}
