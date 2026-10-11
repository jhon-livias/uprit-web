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
        // Esta tabla existía en algunas instalaciones antes de que se añadiera
        // esta migración al historial. No se debe recrear ni perder sus datos.
        if (Schema::hasTable('autoridades')) {
            return;
        }

        Schema::create('autoridades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('cargo');
            $table->enum('tipo', ['Consejo Directivo', 'Alta Dirección', 'Gobierno Interno']);
            $table->string('foto')->nullable();
            $table->string('cv_path')->nullable();
            $table->integer('orden')->default(0);
            $table->boolean('estado')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // La migración puede haber adoptado una tabla preexistente. Por seguridad,
        // el rollback no elimina registros de autoridades.
    }
};
