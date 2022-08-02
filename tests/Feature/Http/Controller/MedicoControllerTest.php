<?php

use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Telefone;
use App\Models\User;
use Illuminate\Support\Facades\Config;

use function Pest\Laravel\post;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\put;
use function Pest\Laravel\delete;

beforeEach(function () {
    $user = User::query()->whereEmail(Config::get('api.email'))->first();
    $this->actingAs($user, 'api');
});

it('criar um paciente', function () {
    $medico = Medico::factory()->make();
    $response = post('/api/medico/store', [
        'nome' => $medico->nome,
        'crm' => $medico->crm,
    ])->assertStatus(201);
    assertDatabaseHas('medicos', [
        'id' => $response->json('data.id'),
        'nome' => $medico->nome,
        'crm' => $medico->crm,
    ]);
});

it('editar um paciente', function () {
    $medico = Medico::factory()->createOne();
    $medicoTwo = Medico::factory()->make();
    $response = put('/api/medico/update/'.$medico->id, [
        'nome' => $medicoTwo->nome,
        'crm' => $medicoTwo->crm,
    ])->assertStatus(200);
    assertDatabaseHas('medicos', [
        'id' => $response->json('data.id'),
        'nome' => $medicoTwo->nome,
        'crm' => $medicoTwo->crm,
    ]);
});

it('deletar um paciente', function () {
    $medico = Medico::factory()->createOne();
    $response = delete('/api/medico/destroy',
        ['id' => $medico->id]
    )->assertStatus(200);
    assertDatabaseMissing('medicos', [
        'id' => $medico->id,
    ]);
});
