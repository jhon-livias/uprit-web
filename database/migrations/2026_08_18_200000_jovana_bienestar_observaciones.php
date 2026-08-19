<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('observaciones')) {
            return;
        }

        $mapping = config('observaciones_estados_bienestar', []);

        foreach ($mapping as $estado => $importIds) {
            if ($importIds === []) {
                continue;
            }

            DB::table('observaciones')
                ->whereIn('import_id', $importIds)
                ->update(['estado' => $estado, 'updated_at' => now()]);
        }
    }

    public function down(): void
    {
        if (! Schema::hasTable('observaciones')) {
            return;
        }

        DB::table('observaciones')
            ->whereBetween('import_id', [21, 27])
            ->update(['estado' => 'pendiente', 'updated_at' => now()]);
    }
};
