<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Preserve the title shown for Marco Sevilla in Autoridades.
     */
    public function up(): void
    {
        DB::table('autoridades')
            ->where('nombre', 'Dr. Marco Antonio Sevilla Gamarra')
            ->update([
                'cargo' => 'Vicerrector de Investigación',
                'updated_at' => now(),
            ]);
    }

    public function down(): void
    {
        // Keep the current authority title on rollback.
    }
};
