<?php

namespace App\Actions\Consulta;

use App\Models\Consulta;

class CreateConsultaAction
{
    public function run(array $data): Consulta
    {
        return Consulta::query()->create([
            'paciente_id' => $data['paciente'],
            'procedimento_id' => $data['procedimento'],
            'medico_id' => $data['medico'],
            'data' => $data['data'],
            'hora' => $data['hora'],
            'particular' => $data['particular'],
        ]);
    }
}
