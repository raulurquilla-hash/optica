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
        Schema::create('optometras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre1', 55);
            $table->string('nombre2', 55);
            $table->string('apellidoP', 55);
            $table->string('apellidoM', 55);
            $table->string('telefono', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('optometras');
    }
};
