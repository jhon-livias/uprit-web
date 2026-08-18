<?php

namespace App\Console\Commands;

use App\Models\Observacion;
use Illuminate\Console\Command;

class SyncAnaMariaObservacionEstados extends Command
{
    protected $signature = 'observaciones:sync-ana-maria-estados {--dry-run : Muestra cambios sin guardar}';

    protected $description = 'Actualiza estados del kanban para observaciones Ana María Romero Sandoval (import_id #1–#8)';

    public function handle(): int
    {
        $mapping = config('observaciones_estados_ana_maria', []);
        $dryRun = (bool) $this->option('dry-run');
        $updated = 0;

        foreach ($mapping as $estado => $importIds) {
            if (! in_array($estado, Observacion::ESTADOS, true)) {
                $this->warn("Estado inválido omitido: {$estado}");

                continue;
            }

            foreach ($importIds as $importId) {
                $observacion = Observacion::query()->where('import_id', $importId)->first();

                if (! $observacion) {
                    $this->warn("#{$importId}: no encontrada");

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

        $suffix = $dryRun ? ' (dry-run)' : '';
        $this->info("Actualizadas {$updated} observaciones{$suffix}.");

        return self::SUCCESS;
    }
}
