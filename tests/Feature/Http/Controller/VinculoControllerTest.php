<?php

namespace Tests\Feature\Http\Controller;

use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\PlanoSaude;
use App\Models\User;
use App\Models\Vinculo;
use Illuminate\Support\Facades\Config;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\post;
use function Pest\Laravel\put;

beforeEach(function () {
    $user = User::query()->whereEmail(Config::get('api.email'))->first();
    $this->actingAs($user, 'api');
});

it('criar um vinculo', function () {
    $paciente = Paciente::factory()->createOne();
    $planoSaude = PlanoSaude::factory()->createOne();
    $consulta = Consulta::factory()->createOne();
    $numeroContrato = rand(1, 100);
    $response = post('/api/vinculo/store', [
        'paciente' => $paciente->id,
        'plano_saude' => $planoSaude->id,
        'consulta' => $consulta->id,
        'contrato' => $numeroContrato,
    ])->assertStatus(201);
    assertDatabaseHas('vinculos', [
        'id' => $response->json('data.id'),
        'paciente_id' => $paciente->id,
        'plano_saude_id' => $planoSaude->id,
        'consulta_id' => $consulta->id,
        'contrato' => $numeroContrato,
    ]);
});

it('editar uma vinculo', function () {
    $vinculo = Vinculo::factory()->createOne();
    $paciente = Paciente::factory()->createOne();
    $planoSaude = PlanoSaude::factory()->createOne();
    $consulta = Consulta::factory()->createOne();

    $numeroContrato = rand(1, 100);
    $response = put('/api/vinculo/update/'.$vinculo->id, [
        'paciente' => $paciente->id,
        'plano_saude' => $planoSaude->id,
        'consulta' => $consulta->id,
        'contrato' => $numeroContrato,
    ])->assertStatus(200);

    assertDatabaseHas('vinculos', [
        'id' => $response->json('data.id'),
        'paciente_id' => $paciente->id,
        'plano_saude_id' => $planoSaude->id,
        'consulta_id' => $consulta->id,
        'contrato' => $numeroContrato,
    ]);
});
