<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('transparencia_documentos', function (Blueprint $table) {
            $table->string('storage_disk', 32)->nullable()->after('archivo');
        });
    }

    public function down(): void
    {
        Schema::table('transparencia_documentos', function (Blueprint $table) {
            $table->dropColumn('storage_disk');
        });
    }
};
