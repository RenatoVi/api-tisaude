<?php

namespace App\Http\Controllers;

use App\Actions\PlanoSaude\CreatePlanoSaudeAction;
use App\Actions\PlanoSaude\UpdatePlanoSaudeAction;
use App\Http\Requests\PlanoSaude\DestroyPlanoSaudeRequest;
use App\Http\Requests\PlanoSaude\StorePlanoSaudeRequest;
use App\Http\Requests\PlanoSaude\UpdatePlanoSaudeRequest;
use App\Http\Resources\PlanoSaudeResource;
use App\Models\PlanoSaude;

class PlanoSaudeController extends Controller
{
    public function store(StorePlanoSaudeRequest $planoSaudeRequest, CreatePlanoSaudeAction $createPlanoSaudeAction)
    {
        try {
            $planoSaude = $createPlanoSaudeAction->run($planoSaudeRequest->validated());
            return new PlanoSaudeResource($planoSaude);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function show(PlanoSaude $planoSaude)
    {
        try {
            return new PlanoSaudeResource($planoSaude);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(UpdatePlanoSaudeRequest $planoSaudeRequest, PlanoSaude $planoSaude, UpdatePlanoSaudeAction $updatePlanoSaudeAction)
    {
        try {
            $planoSaude = $updatePlanoSaudeAction->run($planoSaude, $planoSaudeRequest->validated());
            return new PlanoSaudeResource($planoSaude);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy(DestroyPlanoSaudeRequest $planoSaudeRequest)
    {
        try {
            $planoSaude = PlanoSaude::query()->findOrFail($planoSaudeRequest->input('id'));
            $planoSaude->delete();
            return response()->json(['success' => 'Plano de Saude deletado com sucesso!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
