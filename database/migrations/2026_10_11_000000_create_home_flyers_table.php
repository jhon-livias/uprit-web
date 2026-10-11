<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_flyers', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->nullable();
            $table->string('imagen');
            $table->enum('tipo_enlace', ['interno', 'externo'])->default('interno');
            $table->string('enlace', 500)->nullable();
            $table->boolean('nueva_pestana')->default(false);
            $table->boolean('activo')->default(true);
            $table->unsignedSmallInteger('orden')->default(0);
            $table->timestamps();
        });

        DB::table('home_flyers')->insert([
            [
                'titulo' => 'Servicio Psicopedagógico UPRIT',
                'imagen' => 'web/imagenes/bienestar/psicopedagogico/flyer-oficial.jpg',
                'tipo_enlace' => 'interno',
                'enlace' => '/servicio-psicopedagogico',
                'nueva_pestana' => false,
                'activo' => true,
                'orden' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Servicios de Salud UPRIT',
                'imagen' => 'web/imagenes/bienestar/salud/flyer-oficial.jpg',
                'tipo_enlace' => 'interno',
                'enlace' => '/servicios-de-salud',
                'nueva_pestana' => false,
                'activo' => true,
                'orden' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('home_flyers');
    }
};
