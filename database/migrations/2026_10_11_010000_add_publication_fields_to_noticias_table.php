<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('noticias', function (Blueprint $table) {
            if (!Schema::hasColumn('noticias', 'estado')) {
                $table->boolean('estado')->default(true)->after('descripcion_total');
            }
            if (!Schema::hasColumn('noticias', 'enlace_externo')) {
                $table->string('enlace_externo', 500)->nullable()->after('estado');
            }
            if (!Schema::hasColumn('noticias', 'abrir_nueva_pestana')) {
                $table->boolean('abrir_nueva_pestana')->default(false)->after('enlace_externo');
            }
        });
    }

    public function down(): void
    {
        Schema::table('noticias', function (Blueprint $table) {
            $columns = array_filter(['abrir_nueva_pestana', 'enlace_externo', 'estado'], fn ($column) => Schema::hasColumn('noticias', $column));
            if ($columns) $table->dropColumn($columns);
        });
    }
};
