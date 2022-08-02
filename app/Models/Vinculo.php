<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
