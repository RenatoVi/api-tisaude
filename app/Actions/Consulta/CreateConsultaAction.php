<?php

namespace App\Actions\Consulta;

use App\Models\Consulta;

class CreateConsultaAction
{
    public function run(array $data): Consulta
    {
        return new Consulta();
    }
}
