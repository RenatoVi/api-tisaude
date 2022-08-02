<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Paciente extends Model
{
    use HasFactory;

    public $table = 'pacientes';

    public $fillable = [
        'nome',
        'data_nascimento',
    ];

    public function telefones(): hasMany
    {
        return $this->hasMany(Telefone::class);
    }
}
