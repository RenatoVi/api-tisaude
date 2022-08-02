<?php

namespace Tests\Feature\Http\Controller;

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

it('criar um procedimento', function () {
    $procedimento = Procedimento::factory()->make();
    $response = post('/api/procedimento/store', [
        'nome' => $procedimento->nome,
        'valor' => $procedimento->valor,
    ])->assertStatus(201);
    assertDatabaseHas('procedimentos', [
        'id' => $response->json('data.id'),
        'nome' => $procedimento->nome,
        'valor' => $procedimento->valor,
    ]);
});

it('editar um procedimento', function () {
    $procedimento = Procedimento::factory()->createOne();
    $procedimentoTwo = Procedimento::factory()->make();
    $response = put('/api/procedimento/update/'.$procedimento->id, [
        'nome' => $procedimentoTwo->nome,
        'valor' => $procedimentoTwo->valor,
    ])->assertStatus(200);
    assertDatabaseHas('procedimentos', [
        'id' => $response->json('data.id'),
        'nome' => $procedimentoTwo->nome,
        'valor' => $procedimentoTwo->valor,
    ]);
});

it('deletar um procedimento', function () {
    $procedimento = Procedimento::factory()->createOne();
    $response = delete(
        '/api/procedimento/destroy',
        ['id' => $procedimento->id]
    )->assertStatus(200);
    assertDatabaseMissing('procedimentos', [
        'id' => $procedimento->id,
    ]);
});
