<?php

namespace App\Actions\PlanoSaude;

use App\Models\PlanoSaude;

class UpdatePlanoSaudeAction
{
    public function run(PlanoSaude $planoSaude, array $data): PlanoSaude
    {
        $planoSaude->fill($data);
        $planoSaude->save();
        return $planoSaude;
    }
}
