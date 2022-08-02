<?php

namespace App\Actions\Vinculo;

use App\Models\Vinculo;

class UpdateVinculoAction
{
    public function run(Vinculo $vinculo, array $data): Vinculo
    {
        $vinculo->fill($data);
        $vinculo->save();
        return $vinculo;
    }
}
