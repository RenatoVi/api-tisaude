<?php

namespace App\Http\Controllers;

use App\Actions\Consulta\CreateConsultaAction;
use App\Actions\Consulta\UpdateConsultaAction;
use App\Http\Requests\Consulta\DestroyConsultaRequest;
use App\Http\Requests\Consulta\StoreConsultaRequest;
use App\Http\Requests\Consulta\UpdateConsultaRequest;
use App\Http\Resources\ConsultaResource;
use App\Models\Consulta;

class ConsultaController extends Controller
{
    public function store(StoreConsultaRequest $storeConsultaRequest, CreateConsultaAction $createConsultaAction)
    {
        try {
            $consulta = $createConsultaAction->run($storeConsultaRequest->validated());
            return new ConsultaResource($consulta);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show(Consulta $consulta)
    {
        try {
            return new ConsultaResource($consulta);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(UpdateConsultaRequest $updateConsultaRequest, Consulta $consulta, UpdateConsultaAction $updateConsultaAction)
    {
        try {
            $consulta = $updateConsultaAction->run($consulta, $updateConsultaRequest->validated());
            return new ConsultaResource($consulta);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy(DestroyConsultaRequest $destroyConsultaRequest)
    {
        try {
            $consulta = Consulta::query()->findOrFail($destroyConsultaRequest->input('id'));
            $consulta->delete();
            return response()->json(['success' => 'Consulta deletado com sucesso!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
