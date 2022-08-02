<?php

namespace App\Http\Controllers;

use App\Actions\Especialidade\CreateEspecialidadeAction;
use App\Actions\Especialidade\UpdateEspecialidadeAction;
use App\Http\Requests\Especialidade\DestroyEspecialidadeRequest;
use App\Http\Requests\Especialidade\StoreEspecialidadeRequest;
use App\Http\Requests\Especialidade\UpdateEspecialidadeRequest;
use App\Http\Resources\EspecialidadeResource;
use App\Models\Especialidade;

class EspecialidadeController extends Controller
{
    public function store(StoreEspecialidadeRequest $storeEspecialidadeRequest, CreateEspecialidadeAction $createEspecialidadeAction)
    {
        try {
            $especialidade = $createEspecialidadeAction->run($storeEspecialidadeRequest->validated());
            return new EspecialidadeResource($especialidade);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show(Especialidade $especialidade)
    {
        try {
            return new EspecialidadeResource($especialidade);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(UpdateEspecialidadeRequest $updateEspecialidadeRequest, Especialidade $especialidade, UpdateEspecialidadeAction $updateEspecialidadeAction)
    {
        try {
            $especialidade = $updateEspecialidadeAction->run($especialidade, $updateEspecialidadeRequest->validated());
            return new EspecialidadeResource($especialidade);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy(DestroyEspecialidadeRequest $destroyEspecialidadeRequest)
    {
        try {
            $especialidade = Especialidade::query()->findOrFail($destroyEspecialidadeRequest->input('id'));
            $especialidade->delete();
            return response()->json(['success' => 'Especialidade deletada com sucesso!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
