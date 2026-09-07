<?php

namespace App\Console\Commands;

use App\Models\TransparenciaDocumento;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

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

        $path = public_path('transparencia_documentos');
        File::ensureDirectoryExists($path, 0775);

        $ok = 0;
        $failed = 0;

        foreach ($documentos as $documento) {
            $this->line("Migrando #{$documento->id}: {$documento->etiqueta}");

            try {
                $response = Http::timeout(120)
                    ->withOptions(['verify' => false])
                    ->get($documento->url);

                if (!$response->successful()) {
                    $this->error("  Error HTTP {$response->status()}: {$documento->url}");
                    $failed++;

                    continue;
                }

                $extension = $this->resolveExtension($documento->url, $response->header('Content-Type'));
                $filename = 'transparencia_' . time() . '_' . rand(1, 200) . '.' . $extension;
                $filePath = $path . DIRECTORY_SEPARATOR . $filename;

                file_put_contents($filePath, $response->body());

                $documento->archivo = $filename;
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

    private function resolveExtension(string $url, ?string $contentType): string
    {
        $path = parse_url($url, PHP_URL_PATH);
        $ext = strtolower(pathinfo((string) $path, PATHINFO_EXTENSION));

        if (in_array($ext, ['pdf', 'doc', 'docx', 'xls', 'xlsx'], true)) {
            return $ext;
        }

        return match (true) {
            str_contains((string) $contentType, 'pdf') => 'pdf',
            str_contains((string) $contentType, 'word') => 'docx',
            str_contains((string) $contentType, 'excel') || str_contains((string) $contentType, 'spreadsheet') => 'xlsx',
            default => 'pdf',
        };
    }
}
