<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transparencia_secciones', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('subtitulo')->nullable();
            $table->string('icono', 32)->default('document');
            $table->unsignedInteger('orden')->default(0);
            $table->boolean('abierta_por_defecto')->default(false);
            $table->timestamps();
        });

        Schema::create('transparencia_documentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seccion_id')->constrained('transparencia_secciones')->cascadeOnDelete();
            $table->string('etiqueta');
            $table->string('url')->nullable();
            $table->string('archivo')->nullable();
            $table->unsignedInteger('orden')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transparencia_documentos');
        Schema::dropIfExists('transparencia_secciones');
    }
};
