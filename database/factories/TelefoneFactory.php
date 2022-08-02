<?php

namespace Database\Factories;

use App\Models\Telefone;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Telefone>
 */
class TelefoneFactory extends Factory
{
    protected $model = Telefone::class;

    public function definition()
    {
        return [
            'numero' => $this->faker->phoneNumber,
        ];
    }
}
