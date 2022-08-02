<?php

namespace Database\Factories;

use App\Models\PlanoSaude;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlanoSaudeFactory extends Factory
{
    protected $model = PlanoSaude::class;

    public function definition()
    {
        return [
            'descricao' => $this->faker->name,
            'telefone' => $this->faker->phoneNumber,
        ];
    }
}
