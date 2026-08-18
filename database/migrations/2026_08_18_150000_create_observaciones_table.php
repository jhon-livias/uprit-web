<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('observaciones', function (Blueprint $table) {
            $table->id();
            $table->string('area');
            $table->string('pagina');
            $table->string('carpeta_origen');
            $table->string('titulo', 500);
            $table->text('descripcion');
            $table->string('tipo', 50)->default('observación');
            $table->string('archivo_origen')->nullable();
            $table->string('estado', 30)->default('pendiente');
            $table->string('prioridad', 20)->default('media');
            $table->boolean('es_duplicado')->default(false);
            $table->unsignedBigInteger('duplicado_de')->nullable();
            $table->unsignedInteger('import_id')->nullable();
            $table->unsignedInteger('orden')->default(0);
            $table->timestamps();

            $table->foreign('duplicado_de')->references('id')->on('observaciones')->nullOnDelete();
            $table->index('estado');
            $table->index('area');
            $table->index('carpeta_origen');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('observaciones');
    }
};
