<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConsultaResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'data' => $this->data,
            'hora' => $this->hora,
            'particular' => $this->particular,
            'paciente' => new PacienteResource($this->paciente),
            'medico' => new MedicoResource($this->medico),
            'procedimento' => new ProcedimentoResource($this->procedimento),
        ];
    }
}
