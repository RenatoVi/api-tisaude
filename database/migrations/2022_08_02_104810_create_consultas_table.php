<?php

use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Procedimento;
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
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->time('hora');
            $table->boolean('particular')->default(false);
            $table->foreignIdFor(Paciente::class)
                ->constrained();
            $table->foreignIdFor(Medico::class)
                ->constrained();
            $table->foreignIdFor(Procedimento::class)
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
        Schema::dropIfExists('consultas');
    }
};
