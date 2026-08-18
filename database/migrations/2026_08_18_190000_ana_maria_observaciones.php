<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private const ANA_MARIA_IMPORT_IDS = [1, 2, 3, 4, 5, 6, 7, 8];

    public function up(): void
    {
        $this->normalizeModalidadesNomenclatura();
        $this->normalizeCarreraNombresVirtual();
        $this->markObservacionesEnRevision();
    }

    public function down(): void
    {
        if (! Schema::hasTable('observaciones')) {
            return;
        }

        DB::table('observaciones')
            ->whereIn('import_id', self::ANA_MARIA_IMPORT_IDS)
            ->update(['estado' => 'pendiente', 'updated_at' => now()]);
    }

    private function normalizeModalidadesNomenclatura(): void
    {
        if (! Schema::hasTable('carreras') || ! Schema::hasColumn('carreras', 'modalidades')) {
            return;
        }

        $carreras = DB::table('carreras')
            ->whereNotNull('modalidades')
            ->where('modalidades', 'like', '%Virtual%')
            ->orderBy('id')
            ->get(['id', 'modalidades']);

        foreach ($carreras as $carrera) {
            $oficiales = modalidades_oficiales($carrera->modalidades);

            if ($oficiales === []) {
                continue;
            }

            DB::table('carreras')
                ->where('id', $carrera->id)
                ->update([
                    'modalidades' => implode("\n", $oficiales),
                    'updated_at' => now(),
                ]);
        }
    }

    private function normalizeCarreraNombresVirtual(): void
    {
        if (! Schema::hasTable('carreras') || ! Schema::hasColumn('carreras', 'nombre')) {
            return;
        }

        DB::table('carreras')
            ->where('nombre', 'like', '%(Virtual)%')
            ->update([
                'nombre' => DB::raw("REPLACE(nombre, '(Virtual)', '(A Distancia)')"),
                'updated_at' => now(),
            ]);
    }

    private function markObservacionesEnRevision(): void
    {
        if (! Schema::hasTable('observaciones')) {
            return;
        }

        DB::table('observaciones')
            ->whereIn('import_id', self::ANA_MARIA_IMPORT_IDS)
            ->update(['estado' => 'en_revision', 'updated_at' => now()]);
    }
};
