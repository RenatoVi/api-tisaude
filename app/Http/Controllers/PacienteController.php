<?php

namespace App\Http\Controllers;

use App\Actions\Paciente\CreatePacienteAction;
use App\Actions\Paciente\UpdatePacienteAction;
use App\Http\Requests\Paciente\DestroyPacienteRequest;
use App\Http\Requests\Paciente\StorePacienteRequest;
use App\Http\Requests\Paciente\UpdatePacienteRequest;
use App\Http\Resources\PacienteResource;
use App\Models\Paciente;

class PacienteController extends Controller
{
    public function store(StorePacienteRequest $pacienteRequest, CreatePacienteAction $createPacienteAction)
    {
        try {
            $paciente = $createPacienteAction->run($pacienteRequest->validated());
            return new PacienteResource($paciente);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show(Paciente $paciente)
    {
        try {
            return new PacienteResource($paciente);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(UpdatePacienteRequest $pacienteRequest, Paciente $paciente, UpdatePacienteAction $updatePacienteAction)
    {
        try {
            $paciente = $updatePacienteAction->run($paciente, $pacienteRequest->validated());
            return new PacienteResource($paciente);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy(DestroyPacienteRequest $pacienteRequest)
    {
        try {
            $paciente = Paciente::query()->findOrFail($pacienteRequest->input('id'));
            $paciente->delete();
            return response()->json(['success' => 'Paciente deletado com sucesso!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
