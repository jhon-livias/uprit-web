<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('observaciones', function (Blueprint $table) {
            $table->foreignId('asignado_user_id')->nullable()->after('prioridad')->constrained('users')->nullOnDelete();
            $table->date('fecha_limite')->nullable()->after('asignado_user_id');
        });

        Schema::create('observacion_comentarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('observacion_id')->constrained('observaciones')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->text('comentario');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('observacion_comentarios');

        Schema::table('observaciones', function (Blueprint $table) {
            $table->dropConstrainedForeignId('asignado_user_id');
            $table->dropColumn('fecha_limite');
        });
    }
};
