<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('carrera_certificaciones')) {
            return;
        }

        Schema::create('carrera_certificaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carrera_id');
            $table->unsignedInteger('orden')->default(1);
            $table->string('titulo', 150)->nullable();
            $table->string('nombre', 255);
            $table->string('ciclo', 80)->nullable();
            $table->text('requisitos')->nullable();
            $table->json('cursos')->nullable();
            $table->json('competencias')->nullable();
            $table->text('perfil_salida')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carrera_certificaciones');
    }
};
