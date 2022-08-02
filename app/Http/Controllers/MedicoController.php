<?php

namespace App\Http\Controllers;

use App\Actions\Medico\CreateMedicoAction;
use App\Actions\Medico\UpdateMedicoAction;
use App\Http\Requests\Medico\CreateMedicoRequest;
use App\Http\Requests\Medico\DestroyMedicoRequest;
use App\Http\Requests\Medico\UpdateMedicoRequest;
use App\Http\Resources\MedicoResource;
use App\Models\Medico;

class MedicoController extends Controller
{
    public function store(CreateMedicoRequest $createMedicoRequest, CreateMedicoAction $createMedicoAction)
    {
        try{
            $medico = $createMedicoAction->run($createMedicoRequest->validated());
            return new MedicoResource($medico);
        }catch (\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show(Medico $medico)
    {
        try{
            return new MedicoResource($medico);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(UpdateMedicoRequest $updateMedicoRequest, Medico $medico, UpdateMedicoAction $updateMedicoAction)
    {
        try {
            $medico = $updateMedicoAction->run($medico, $updateMedicoRequest->validated());
            return new MedicoResource($medico);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy(DestroyMedicoRequest $destroyMedicoRequest)
    {
        try {
            $medico = Medico::query()->findOrFail($destroyMedicoRequest->input('id'));
            $medico->delete();
            return response()->json(['success' => 'Medico deletado com sucesso!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
