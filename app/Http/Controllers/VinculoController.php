<?php

namespace App\Http\Controllers;

use App\Actions\Vinculo\CreateVinculoAction;
use App\Actions\Vinculo\UpdateVinculoAction;
use App\Http\Requests\Vinculo\DestroyVinculoRequest;
use App\Http\Requests\Vinculo\StoreVinculoRequest;
use App\Http\Requests\Vinculo\UpdateVinculoRequest;
use App\Http\Resources\VinculoResource;
use App\Models\Vinculo;

class VinculoController extends Controller
{
    public function store(StoreVinculoRequest $storeVinculoRequest, CreateVinculoAction $createVinculoAction)
    {
        try {
            $vinculo = $createVinculoAction->run($storeVinculoRequest->validated());
            return new VinculoResource($vinculo);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show(Vinculo $vinculo)
    {
        try {
            return new VinculoResource($vinculo);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(UpdateVinculoRequest $updateVinculoRequest, Vinculo $vinculo, UpdateVinculoAction $updateVinculoAction)
    {
        try {
            $medico = $updateVinculoAction->run($vinculo, $updateVinculoRequest->validated());
            return new VinculoResource($medico);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy(DestroyVinculoRequest $destroyVinculoRequest)
    {
        try {
            $vinculo = Vinculo::query()->findOrFail($destroyVinculoRequest->input('id'));
            $vinculo->delete();
            return response()->json(['success' => 'Vinculo deletado com sucesso!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
