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
            'paciente' => new PacienteResource($this->paciente),
            'plano_saude' => new PlanoSaudeResource($this->plano_saude),
            'consulta' => new ConsultaResource($this->consulta),
        ];
    }
}
