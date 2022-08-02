<?php

namespace Tests\Feature\Http\Controller;

use App\Models\PlanoSaude;
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

it('criar um plano de saude', function () {
    $planoSaude = PlanoSaude::factory()->make();
    $response = post('/api/plano-saude/store', [
        'descricao' => $planoSaude->descricao,
        'telefone' => $planoSaude->telefone,
    ])->assertStatus(201);
    assertDatabaseHas('plano_saudes', [
        'id' => $response->json('data.id'),
        'descricao' => $planoSaude->descricao,
        'telefone' => $planoSaude->telefone,
    ]);
});

it('editar um plano de saude', function () {
    $planoSaude = PlanoSaude::factory()->createOne();
    $planoSaudeTwo = PlanoSaude::factory()->make();
    $response = put('/api/plano-saude/update/'.$planoSaude->id, [
        'descricao' => $planoSaudeTwo->descricao,
        'telefone' => $planoSaudeTwo->telefone,
    ])->assertStatus(200);
    assertDatabaseHas('plano_saudes', [
        'id' => $response->json('data.id'),
        'descricao' => $planoSaudeTwo->descricao,
        'telefone' => $planoSaudeTwo->telefone,
    ]);
});

it('deletar um plano de saude', function () {
    $planoSaude = PlanoSaude::factory()->createOne();
    $response = delete(
        '/api/plano-saude/destroy',
        ['id' => $planoSaude->id]
    )->assertStatus(200);
    assertDatabaseMissing('plano_saudes', [
        'id' => $planoSaude->id,
    ]);
});
