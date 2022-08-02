<?php

namespace App\Actions\Vinculo;

use App\Models\Vinculo;

class CreateVinculoAction
{
    public function run(array $data): Vinculo
    {
        return Vinculo::query()->create($data);
    }
}
