<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Consulta extends Model
{
    use HasFactory;

    public $table = 'consultas';

    public $fillable = [
        'data',
        'hora',
        'particular',
        'paciente_id',
        'medico_id',
        'procedimento_id',
    ];

    public function paciente(): BelongsTo
    {
        return $this->belongsTo(Paciente::class);
    }

    public function medico(): BelongsTo
    {
        return $this->belongsTo(Medico::class);
    }

    public function procedimento(): BelongsTo
    {
        return $this->belongsTo(Procedimento::class);
    }
}
