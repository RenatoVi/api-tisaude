<?php

namespace App\Actions\Paciente;

use App\Models\Paciente;
use App\Models\Telefone;

class CreatePacienteAction
{
    public function run(array $data): Paciente
    {
        $paciente = Paciente::query()
            ->create($data);
        $paciente->telefones()->save(new Telefone([
            'numero' => $data['telefone'],
        ]));
        return $paciente;
    }
}
