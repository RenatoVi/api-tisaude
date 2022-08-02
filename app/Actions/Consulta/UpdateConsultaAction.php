<?php

namespace App\Actions\Consulta;

use App\Models\Consulta;

class UpdateConsultaAction
{
    public function run(Consulta $consulta, array $data): Consulta
    {
        $consulta->fill($data);
        $consulta->save();
        return $consulta;
    }
}
