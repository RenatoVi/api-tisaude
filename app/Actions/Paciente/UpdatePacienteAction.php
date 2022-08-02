<?php

namespace App\Actions\Paciente;

use App\Models\Paciente;

class UpdatePacienteAction
{
    public function run(Paciente $paciente, array $data): Paciente
    {
        $paciente->fill($data);
        $paciente->save();
        $paciente->telefones()->update([
            'numero' => $data['telefone'],
        ]);
        return $paciente;
    }
}
