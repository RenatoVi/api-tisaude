<?php

use App\Models\Consulta;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Procedimento;
use App\Models\User;
use Illuminate\Support\Facades\Config;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\delete;
use function Pest\Laravel\post;
use function Pest\Laravel\put;

beforeEach(function () {
    $user = User::query()->whereEmail(Config::get('api.email'))->first();
    $this->actingAs($user, 'api');
});

it('criar uma consulta', function () {
    $medico = Medico::factory()->createOne();
    $paciente = Paciente::factory()->createOne();
    $procedimento = Procedimento::factory()->createOne();
    $response = post('/api/consulta/store', [
        'data' => now()->format('Y-m-d'),
        'hora' => now()->format('H:i'),
        'particular' => true,
        'paciente' => $paciente->id,
        'medico' => $medico->id,
        'procedimento' => $procedimento->id,
    ])->assertStatus(201);
    assertDatabaseHas('consultas', [
        'id' => $response->json('id'),
        'particular' => true,
        'paciente_id' => $paciente->id,
        'medico_id' => $medico->id,
        'procedimento_id' => $procedimento->id,
    ]);
});

it('editar uma consulta', function () {
    $consulta = Consulta::factory()->createOne();
    $medico = Medico::factory()->createOne();
    $paciente = Paciente::factory()->createOne();
    $procedimento = Procedimento::factory()->createOne();

    $response = put('/api/consulta/update/'.$consulta->id, [
        'data' => now()->format('Y-m-d'),
        'hora' => now()->format('H:i'),
        'particular' => false,
        'paciente' => $paciente->id,
        'medico' => $medico->id,
        'procedimento' => $procedimento->id,
    ])->assertStatus(200);

    assertDatabaseHas('consultas', [
        'id' => $response->json('id'),
        'particular' => false,
        'paciente_id' => $paciente->id,
        'medico_id' => $medico->id,
        'procedimento_id' => $procedimento->id,
    ]);
});

it('deletar uma consulta', function () {
    $consulta = Consulta::factory()->createOne();
    $response = delete(
        '/api/consulta/destroy',
        ['id' => $consulta->id]
    )->assertStatus(200);
    assertDatabaseMissing('consultas', [
        'id' => $consulta->id,
    ]);
});
