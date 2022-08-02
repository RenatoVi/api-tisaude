<?php

namespace App\Actions\PlanoSaude;

use App\Models\PlanoSaude;

class CreatePlanoSaudeAction
{
    public function run(array $data): PlanoSaude
    {
        return PlanoSaude::query()
            ->create($data);
    }
}
