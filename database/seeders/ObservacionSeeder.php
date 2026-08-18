<?php

namespace Database\Seeders;

use App\Models\Observacion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObservacionSeeder extends Seeder
{
    public function run(): void
    {
        $path = base_path('data/export/observaciones-import.json');

        if (! file_exists($path)) {
            $this->command?->error('No se encontró data/export/observaciones-import.json');

            return;
        }

        $payload = json_decode(file_get_contents($path), true);
        $items = $payload['observaciones'] ?? [];

        if (empty($items)) {
            $this->command?->warn('No hay observaciones para importar.');

            return;
        }

        DB::transaction(function () use ($items) {
            Observacion::query()->delete();

            $idMap = [];

            foreach ($items as $index => $item) {
                $archivo = $item['archivo_origen'] ?? '';

                $observacion = Observacion::create([
                    'area' => $item['area'] ?? 'General',
                    'pagina' => $item['pagina'] ?? 'General',
                    'carpeta_origen' => $item['carpeta_origen'] ?? $this->extractCarpeta($archivo),
                    'titulo' => $item['titulo'] ?? 'Sin título',
                    'descripcion' => $item['descripcion'] ?? '',
                    'tipo' => $item['tipo'] ?? 'observación',
                    'archivo_origen' => $archivo,
                    'estado' => $this->normalizeEstado($item['estado'] ?? 'pendiente'),
                    'prioridad' => $item['prioridad'] ?? 'media',
                    'es_duplicado' => (bool) ($item['es_duplicado'] ?? false),
                    'import_id' => $item['id'] ?? null,
                    'orden' => $index,
                ]);

                if (! empty($item['id'])) {
                    $idMap[(int) $item['id']] = $observacion->id;
                }
            }

            foreach ($items as $item) {
                if (empty($item['duplicado_de']) || empty($item['id'])) {
                    continue;
                }

                $dbId = $idMap[(int) $item['id']] ?? null;
                $parentDbId = $idMap[(int) $item['duplicado_de']] ?? null;

                if ($dbId && $parentDbId) {
                    Observacion::whereKey($dbId)->update([
                        'duplicado_de' => $parentDbId,
                        'es_duplicado' => true,
                    ]);
                }
            }
        });

        $total = Observacion::count();
        $duplicados = Observacion::where('es_duplicado', true)->count();
        $this->command?->info("Importadas {$total} observaciones ({$duplicados} duplicadas).");
    }

    private function extractCarpeta(string $archivo): string
    {
        if ($archivo === '') {
            return 'Sin carpeta';
        }

        $parts = explode('/', str_replace('\\', '/', $archivo), 2);

        return $parts[0] ?? 'Sin carpeta';
    }

    private function normalizeEstado(string $estado): string
    {
        $estado = str_replace([' ', '-'], '_', strtolower(trim($estado)));

        return in_array($estado, Observacion::ESTADOS, true) ? $estado : 'pendiente';
    }
}
