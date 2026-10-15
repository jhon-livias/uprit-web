<?php

namespace App\Console\Commands;

use App\Models\TransparenciaDocumento;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class MigrateTransparenciaCdnToLocal extends Command
{
    protected $signature = 'transparencia:migrate-cdn-to-local
                            {--dry-run : Muestra los documentos a migrar sin descargar}
                            {--cdn-only : Solo migra URLs del CDN cdn.uprit.edu.pe}';

    protected $description = 'Descarga documentos con URL externa (CDN) y los guarda como archivos locales';

    public function handle(): int
    {
        $dryRun = (bool) $this->option('dry-run');
        $cdnOnly = (bool) $this->option('cdn-only');

        $query = TransparenciaDocumento::query()
            ->whereNotNull('url')
            ->whereNull('archivo')
            ->where('url', '!=', '');

        if ($cdnOnly) {
            $query->where('url', 'like', '%cdn.uprit.edu.pe%');
        }

        $documentos = $query->orderBy('id')->get();

        if ($documentos->isEmpty()) {
            $this->info('No hay documentos con URL externa pendientes de migrar.');

            return self::SUCCESS;
        }

        $this->info("Documentos a migrar: {$documentos->count()}");

        if ($dryRun) {
            foreach ($documentos as $documento) {
                $this->line("#{$documento->id} [{$documento->etiqueta}]: {$documento->url}");
            }

            $this->warn('Modo dry-run: no se descargaron archivos.');

            return self::SUCCESS;
        }

        $ok = 0;
        $failed = 0;

        foreach ($documentos as $documento) {
            $this->line("Migrando #{$documento->id}: {$documento->etiqueta}");

            try {
                $response = Http::timeout(120)->get($documento->url);

                if (!$response->successful()) {
                    $this->error("  Error HTTP {$response->status()}: {$documento->url}");
                    $failed++;

                    continue;
                }

                if (! $this->isPdf($response->header('Content-Type'), $response->body())) {
                    $this->warn('  Omitido: solo se migran documentos PDF válidos.');
                    $failed++;

                    continue;
                }

                $filename = 'transparencia_' . bin2hex(random_bytes(16)) . '.pdf';
                Storage::disk('local')->put('transparencia/documentos/' . $filename, $response->body());

                $documento->archivo = $filename;
                $documento->storage_disk = 'local';
                $documento->url = null;
                $documento->save();

                $this->info("  Guardado: {$filename}");
                $ok++;
            } catch (\Throwable $e) {
                $this->error("  Error: {$e->getMessage()}");
                $failed++;
            }
        }

        $this->newLine();
        $this->info("Migrados: {$ok} | Fallidos: {$failed}");

        return $failed > 0 ? self::FAILURE : self::SUCCESS;
    }

    private function isPdf(?string $contentType, string $contents): bool
    {
        return str_contains((string) $contentType, 'application/pdf')
            && str_starts_with($contents, '%PDF-');
    }
}
