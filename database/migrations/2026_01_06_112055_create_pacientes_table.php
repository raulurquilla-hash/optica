<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_consulta');
            $table->string('nombre1', 55);
            $table->string('nombre2', 55);
            $table->string('apellidoP', 55);
            $table->string('apellidoM', 55);
            $table->string('DUI', 10)->unique();
            $table->date('fecha_nacimiento');
            $table->string('genero', 10);
            $table->string('telefono', 15);
            $table->string('email', 100);
            $table->text('direccion');
            $table->string('expediente_medico', 50)->unique();  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
