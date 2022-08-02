<?php

use App\Models\Medico;
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

