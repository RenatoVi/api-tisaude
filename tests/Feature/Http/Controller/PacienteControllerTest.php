<?php

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
    $paciente = Paciente::factory()->make();
    $telefone = Telefone::factory()->make();
    $response = post('/api/paciente/store', [
        'nome' => $paciente->nome,
        'data_nascimento' => $paciente->data_nascimento,
        'telefone' => $telefone->numero,
    ])->assertStatus(201);
    assertDatabaseHas('pacientes', [
        'id' => $response->json('data.id'),
        'nome' => $paciente->nome,
        'data_nascimento' => $paciente->data_nascimento,
    ]);
    assertDatabaseHas('telefones', [
        'numero' => $telefone->numero,
        'paciente_id' => $response->json('data.id'),
    ]);
});

it('editar um paciente', function () {
    $paciente = Paciente::factory()->createOne();
    $pacienteTwo = Paciente::factory()->make();
    $telefone = Telefone::factory()->make();
    $response = put('/api/paciente/update/'.$paciente->id, [
        'nome' => $pacienteTwo->nome,
        'data_nascimento' => $pacienteTwo->data_nascimento,
        'telefone' => $telefone->numero,
    ])->assertStatus(200);
    assertDatabaseHas('pacientes', [
        'id' => $response->json('data.id'),
        'nome' => $pacienteTwo->nome,
        'data_nascimento' => $pacienteTwo->data_nascimento,
    ]);
    assertDatabaseHas('telefones', [
        'numero' => $telefone->numero,
        'paciente_id' => $response->json('data.id'),
    ]);
});

it('deletar um paciente', function () {
    $paciente = Paciente::factory()->createOne();
    $response = delete(
        '/api/paciente/destroy',
        ['id' => $paciente->id]
    )->assertStatus(200);
    assertDatabaseMissing('pacientes', [
        'id' => $paciente->id,
    ]);
});
