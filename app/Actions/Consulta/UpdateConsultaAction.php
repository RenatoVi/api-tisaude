<?php

namespace App\Actions\Consulta;

use App\Models\Consulta;

class UpdateConsultaAction
{
    public function run(Consulta $consulta, array $data): Consulta
    {
        $consulta->fill($data);
        $consulta->paciente_id = $data['paciente'];
        $consulta->procedimento_id = $data['procedimento'];
        $consulta->medico_id = $data['medico'];
        $consulta->save();
        return $consulta;
    }
}
