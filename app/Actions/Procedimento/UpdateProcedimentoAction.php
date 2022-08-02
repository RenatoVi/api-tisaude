<?php

namespace App\Actions\Procedimento;

use App\Models\Procedimento;

class UpdateProcedimentoAction
{
    public function run(Procedimento $procedimento, array $data): Procedimento
    {
        $procedimento->fill($data);
        $procedimento->save();
        return $procedimento;
    }
}
