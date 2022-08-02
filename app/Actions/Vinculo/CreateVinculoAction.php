<?php

namespace App\Actions\Vinculo;

use App\Models\Vinculo;

class CreateVinculoAction
{
    public function run(array $data): Vinculo
    {
        return Vinculo::query()->create([
            'contrato' => $data['contrato'],
            'paciente_id' => $data['paciente'],
            'plano_saude_id' => $data['plano_saude'],
            'consulta_id' => $data['consulta'],
        ]);
    }
}
