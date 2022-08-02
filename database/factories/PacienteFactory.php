<?php

namespace Database\Factories;

use App\Models\Paciente;
use App\Models\Telefone;
use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteFactory extends Factory
{
    protected $model = Paciente::class;

    public function configure()
    {
        return $this->afterCreating(function (Paciente $paciente) {
            $paciente->telefones()->save(Telefone::factory()->make());
        });
    }

    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'data_nascimento' => $this->faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
        ];
    }
}
