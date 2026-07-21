<?php

namespace App\Console\Commands;

use App\Models\TransparenciaDocumento;
use App\Models\TransparenciaSeccion;
use Illuminate\Console\Command;

class ImportTransparenciaLegacy extends Command
{
    protected $signature = 'transparencia:import-legacy {--force : Reemplaza datos existentes}';

    protected $description = 'Importa secciones y documentos desde la vista legacy de transparencia';

    public function handle(): int
    {
        $legacyPath = resource_path('views/web/partials/transparencia-legacy.blade.php');

        if (!is_file($legacyPath)) {
            $this->error('No existe transparencia-legacy.blade.php');

            return self::FAILURE;
        }

        if (TransparenciaSeccion::exists() && !$this->option('force')) {
            $this->warn('Ya hay datos. Usa --force para reimportar.');

            return self::SUCCESS;
        }

        if ($this->option('force')) {
            TransparenciaSeccion::query()->delete();
        }

        $html = file_get_contents($legacyPath);
        $blocks = preg_split('/<div class="accordion-item">/', $html);
        array_shift($blocks);

        $orden = 0;
        foreach ($blocks as $index => $block) {
            if (!preg_match('/<div class="ms-3 text-start">\s*<div>(.*?)<\/div>\s*<small>([\s\S]*?)<\/small>/s', $block, $header)) {
                $this->warn("Sección #{$index}: no se pudo leer encabezado");
                continue;
            }

            $seccion = TransparenciaSeccion::create([
                'titulo' => trim(html_entity_decode(strip_tags($header[1]))),
                'subtitulo' => trim(preg_replace('/\s+/', ' ', html_entity_decode(strip_tags($header[2])))),
                'icono' => $this->detectIcon($block),
                'orden' => $orden,
                'abierta_por_defecto' => $index === 0,
            ]);

            $body = $block;
            if (preg_match('/<div class="accordion-body">([\s\S]*?)<\/div>\s*<\/div>\s*<\/div>/s', $block, $bodyMatch)) {
                $body = $bodyMatch[1];
            }

            preg_match_all('/<a[^>]*href="([^"]+)"[^>]*>[\s\S]*?<\/svg>\s*([^<]+?)\s*<\/a>/i', $body, $links, PREG_SET_ORDER);

            $docOrden = 0;
            foreach ($links as $link) {
                TransparenciaDocumento::create([
                    'seccion_id' => $seccion->id,
                    'etiqueta' => trim(html_entity_decode($link[2])),
                    'url' => trim($link[1]),
                    'orden' => $docOrden++,
                ]);
            }

            $this->line("Sección: {$seccion->titulo} ({$docOrden} docs)");
            $orden++;
        }

        $this->info("Importadas {$orden} secciones.");

        return self::SUCCESS;
    }

    private function detectIcon(string $block): string
    {
        if (str_contains($block, 'viewBox="0 0 576 512"')) {
            return 'book-open';
        }

        if (str_contains($block, 'M318.38 208h-39.09')) {
            return 'graduation';
        }

        return 'document';
    }
}
