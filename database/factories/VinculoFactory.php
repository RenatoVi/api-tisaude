<?php

namespace Database\Factories;

use App\Models\Vinculo;
use Illuminate\Database\Eloquent\Factories\Factory;

class VinculoFactory extends Factory
{
    protected $model = Vinculo::class;

    public function definition()
    {
        return [
            'contrato' => $this->faker->word,
        ];
    }
}
