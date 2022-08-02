<?php

namespace Database\Factories;

use App\Models\Procedimento;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProcedimentoFactory extends Factory
{
    protected $model = Procedimento::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->word,
            'valor' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
