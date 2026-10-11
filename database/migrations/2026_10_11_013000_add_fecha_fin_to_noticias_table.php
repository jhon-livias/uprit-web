<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('noticias', 'fecha_fin')) {
            Schema::table('noticias', fn (Blueprint $table) => $table->date('fecha_fin')->nullable()->after('fecha'));
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('noticias', 'fecha_fin')) Schema::table('noticias', fn (Blueprint $table) => $table->dropColumn('fecha_fin'));
    }
};
