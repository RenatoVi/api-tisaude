<?php

namespace Database\Factories;

use App\Models\Medico;
use Illuminate\Database\Eloquent\Factories\Factory;


class MedicoFactory extends Factory
{
    protected $model = Medico::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'crm' => $this->faker->unique()->numberBetween(1, 99999),
        ];
    }
}
