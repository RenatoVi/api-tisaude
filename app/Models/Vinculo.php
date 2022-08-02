<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vinculo extends Model
{
    use HasFactory;

    public $table = 'vinculos';

    public $fillable = [
        'paciente_id',
        'plano_saude_id',
        'consulta_id',
        'contrato',
    ];

    public function paciente(): BelongsTo
    {
        return $this->belongsTo(Paciente::class);
    }

    public function plano_saude(): BelongsTo
    {
        return $this->belongsTo(PlanoSaude::class);
    }

    public function consulta(): BelongsTo
    {
        return $this->belongsTo(Consulta::class);
    }
}
