<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VinculoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'contrato' => $this->contrato,
            'paciente_id' => $this->paciente_id,
            'plano_saude_id' => $this->plano_saude_id,
            'consulta_id' => $this->consulta_id,
        ];
    }
}
