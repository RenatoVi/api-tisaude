<?php

namespace Tests\Feature\Http\Controller;

use App\Models\Especialidade;
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

it('criar um especialidade', function () {
    $especialidade = Especialidade::factory()->make();
    $response = post('/api/especialidade/store', [
        'nome' => $especialidade->nome,
    ])->assertStatus(201);
    assertDatabaseHas('especialidades', [
        'id' => $response->json('data.id'),
        'nome' => $especialidade->nome,
    ]);
});

it('editar uma especialidade', function () {
    $especialidade = Especialidade::factory()->createOne();
    $especialidadeTwo = Especialidade::factory()->make();
    $response = put('/api/especialidade/update/'.$especialidade->id, [
        'nome' => $especialidadeTwo->nome,
    ])->assertStatus(200);
    assertDatabaseHas('especialidades', [
        'id' => $response->json('data.id'),
        'nome' => $especialidadeTwo->nome,
    ]);
});

it('deletar uma especialidade', function () {
    $especialidade = Especialidade::factory()->createOne();
    $response = delete('/api/especialidade/destroy',
        ['id' => $especialidade->id]
    )->assertStatus(200);
    assertDatabaseMissing('especialidades', [
        'id' => $especialidade->id,
    ]);
});
