<?php

namespace App\Http\Controllers;

use App\Actions\Procedimento\CreateProcedimentoAction;
use App\Actions\Procedimento\UpdateProcedimentoAction;
use App\Http\Requests\Procedimento\DestroyProcedimentoRequest;
use App\Http\Requests\Procedimento\StoreProcedimentoRequest;
use App\Http\Requests\Procedimento\UpdateProcedimentoRequest;
use App\Http\Resources\ProcedimentoResource;
use App\Models\Procedimento;

class ProcedimentoController extends Controller
{
    public function store(StoreProcedimentoRequest $storeProcedimentoRequest, CreateProcedimentoAction $createProcedimentoAction)
    {
        try{
            $procedimento = $createProcedimentoAction->run($storeProcedimentoRequest->validated());
            return new ProcedimentoResource($procedimento);
        }catch (\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show(Procedimento $procedimento)
    {
        try{
            return new ProcedimentoResource($procedimento);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(UpdateProcedimentoRequest $updateProcedimentoRequest, Procedimento $procedimento, UpdateProcedimentoAction $updateProcedimentoAction)
    {
        try {
            $procedimento = $updateProcedimentoAction->run($procedimento, $updateProcedimentoRequest->validated());
            return new ProcedimentoResource($procedimento);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy(DestroyProcedimentoRequest $destroyProcedimentoRequest)
    {
        try {
            $procedimento = Procedimento::query()->findOrFail($destroyProcedimentoRequest->input('id'));
            $procedimento->delete();
            return response()->json(['success' => 'Procedimento deletado com sucesso!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
