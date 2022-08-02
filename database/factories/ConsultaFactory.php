<?php

namespace Database\Factories;

use App\Models\Consulta;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConsultaFactory extends Factory
{
    protected $model = Consulta::class;

    public function definition()
    {
        return [
            'data' => $this->faker->dateTimeBetween('-1 years', '+1 years'),
            'hora' => $this->faker->time('H:i:s'),
            'particular' => $this->faker->randomElement([true, false]),
        ];
    }
}
