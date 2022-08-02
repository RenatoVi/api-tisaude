<?php

namespace App\Actions\Medico;

use App\Models\Medico;

class UpdateMedicoAction
{
    public function run(Medico $medico, array $data): Medico
    {
        $medico->fill($data);
        $medico->save();
        return $medico;
    }
}
