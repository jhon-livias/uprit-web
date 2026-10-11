<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('noticias', 'slug')) return;
        Schema::table('noticias', fn (Blueprint $table) => $table->string('slug')->nullable()->after('titulo'));
        DB::table('noticias')->orderBy('id')->get()->each(function ($news) {
            $base = Str::slug($news->titulo) ?: 'noticia';
            $slug = $base;
            $suffix = 2;
            while (DB::table('noticias')->where('slug', $slug)->exists()) $slug = $base . '-' . $suffix++;
            DB::table('noticias')->where('id', $news->id)->update(['slug' => $slug]);
        });
        Schema::table('noticias', fn (Blueprint $table) => $table->unique('slug'));
    }

    public function down(): void
    {
        if (Schema::hasColumn('noticias', 'slug')) Schema::table('noticias', function (Blueprint $table) { $table->dropUnique(['slug']); $table->dropColumn('slug'); });
    }
};
