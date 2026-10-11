<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('categorias_noticias', 'orden')) {
            Schema::table('categorias_noticias', fn (Blueprint $table) => $table->unsignedInteger('orden')->default(0)->after('nombre'));
            DB::table('categorias_noticias')->orderBy('id')->get()->each(fn ($category, $index) => DB::table('categorias_noticias')->where('id', $category->id)->update(['orden' => $index + 1]));
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('categorias_noticias', 'orden')) Schema::table('categorias_noticias', fn (Blueprint $table) => $table->dropColumn('orden'));
    }
};
