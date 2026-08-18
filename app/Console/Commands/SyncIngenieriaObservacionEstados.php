<?php

namespace App\Console\Commands;

use App\Models\Observacion;
use Illuminate\Console\Command;

class SyncIngenieriaObservacionEstados extends Command
{
    protected $signature = 'observaciones:sync-ingenieria-estados {--dry-run : Muestra cambios sin guardar}';

    protected $description = 'Actualiza estados del kanban para observaciones Ingeniería Enrique Boy (import_id #81–#110)';

    public function handle(): int
    {
        $mapping = config('observaciones_estados_ingenieria', []);
        $dryRun = (bool) $this->option('dry-run');
        $updated = 0;
        $missing = [];

        foreach ($mapping as $estado => $importIds) {
            if (! in_array($estado, Observacion::ESTADOS, true)) {
                $this->error("Estado inválido en config: {$estado}");

                return self::FAILURE;
            }

            foreach ($importIds as $importId) {
                $observacion = Observacion::query()->where('import_id', $importId)->first();

                if (! $observacion) {
                    $missing[] = $importId;
                    continue;
                }

                if ($observacion->estado === $estado) {
                    continue;
                }

                $this->line("#{$importId}: {$observacion->estado} → {$estado}");

                if (! $dryRun) {
                    $observacion->update(['estado' => $estado]);
                }

                $updated++;
            }
        }

        if ($missing !== []) {
            $this->warn('Sin registro en BD (import_id): '.implode(', ', $missing));
        }

        $suffix = $dryRun ? ' (dry-run)' : '';
        $this->info("Actualizadas {$updated} observaciones{$suffix}.");

        return self::SUCCESS;
    }
}
