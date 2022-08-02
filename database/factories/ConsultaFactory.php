<?php

namespace Database\Factories;

use App\Models\Consulta;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Procedimento;
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
            'paciente_id' => Paciente::factory(),
            'medico_id' => Medico::factory(),
            'procedimento_id' => Procedimento::factory(),
        ];
    }
}
