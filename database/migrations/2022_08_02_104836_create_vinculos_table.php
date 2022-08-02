<?php

use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\PlanoSaude;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vinculos', function (Blueprint $table) {
            $table->id();
            $table->string('contrato', 255);
            $table->foreignIdFor(Paciente::class)
                ->constrained();
            $table->foreignIdFor(PlanoSaude::class)
                ->constrained();
            $table->foreignIdFor(Consulta::class)
                ->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vinculos');
    }
};
