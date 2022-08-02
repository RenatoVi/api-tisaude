<?php

namespace App\Actions\Vinculo;

use App\Models\Vinculo;

class UpdateVinculoAction
{
    public function run(Vinculo $vinculo, array $data): Vinculo
    {
        $vinculo->fill($data);
        $vinculo->paciente_id = $data['paciente'];
        $vinculo->plano_saude_id = $data['plano_saude'];
        $vinculo->consulta_id = $data['consulta'];
        $vinculo->save();
        return $vinculo;
    }
}
