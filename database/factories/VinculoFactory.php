<?php

namespace Database\Factories;

use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\PlanoSaude;
use App\Models\Vinculo;
use Illuminate\Database\Eloquent\Factories\Factory;

class VinculoFactory extends Factory
{
    protected $model = Vinculo::class;

    public function definition()
    {
        return [
            'contrato' => $this->faker->word,
            'paciente_id' => Paciente::factory(),
            'plano_saude_id' => PlanoSaude::factory(),
            'consulta_id' => Consulta::factory(),
        ];
    }
}
