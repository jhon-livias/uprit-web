<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /** Educación con Mención en Comunicación, Literatura y Lingüística (Pregrado y Pregrado Puede). */
    private const CARRERAS = [2, 29];

    public function up(): void
    {
        $this->fixMallaCursos();
    }

    public function down(): void
    {
        // No reversible: los nombres originales mezclaban mayúsculas inconsistentes.
    }

    private function fixMallaCursos(): void
    {
        if (! Schema::hasTable('carrera_malla_curricular')) {
            return;
        }

        $rows = DB::table('carrera_malla_curricular')
            ->whereIn('carrera_id', self::CARRERAS)
            ->get(['id', 'ciclo', 'cursos']);

        foreach ($rows as $row) {
            $ciclo = preg_replace('/^CICLO/i', 'Ciclo', $row->ciclo) ?? $row->ciclo;
            $cursos = json_decode($row->cursos ?? '[]', true);

            if (! is_array($cursos)) {
                continue;
            }

            $cursos = array_map(
                fn (string $curso) => $this->formatNombreCurso($curso),
                $cursos
            );

            DB::table('carrera_malla_curricular')
                ->where('id', $row->id)
                ->update([
                    'ciclo' => $ciclo,
                    'cursos' => json_encode($cursos, JSON_UNESCAPED_UNICODE),
                    'updated_at' => now(),
                ]);
        }
    }

    private function formatNombreCurso(string $text): string
    {
        $text = trim(preg_replace('/\s+/u', ' ', $text) ?? $text);

        if ($text === '') {
            return $text;
        }

        $suffix = '';
        if (preg_match('/\s*(\(\*\))\s*$/u', $text, $matches)) {
            $suffix = ' '.$matches[1];
            $text = trim(substr($text, 0, -strlen($matches[0])));
        }

        foreach ([
            'DRAMÁITCO' => 'DRAMÁTICO',
            'INVESTIGACION' => 'INVESTIGACIÓN',
        ] as $search => $replace) {
            $text = preg_replace('/\b'.preg_quote($search, '/').'\b/ui', $replace, $text) ?? $text;
        }

        $lowercaseWords = ['de', 'del', 'en', 'la', 'el', 'los', 'las', 'y', 'e', 'ni', 'a', 'al', 'con', 'para'];
        $acronyms = ['TIC', 'ETS'];
        $romanNumerals = ['i', 'ii', 'iii', 'iv', 'v', 'vi', 'vii', 'viii', 'ix', 'x'];

        $words = preg_split('/\s+/u', $text) ?: [];
        $formatted = [];

        foreach ($words as $index => $word) {
            $upper = mb_strtoupper($word, 'UTF-8');

            if (in_array($upper, $acronyms, true)) {
                $formatted[] = $upper;
                continue;
            }

            if (preg_match('/^([A-Za-zÁÉÍÓÚÜÑáéíóúüñ]+)-([A-Za-zÁÉÍÓÚÜÑáéíóúüñ]+)$/u', $word, $parts)) {
                $left = mb_strtoupper($parts[1], 'UTF-8') === 'E' ? 'E' : mb_convert_case(mb_strtolower($parts[1], 'UTF-8'), MB_CASE_TITLE, 'UTF-8');
                $right = mb_convert_case(mb_strtolower($parts[2], 'UTF-8'), MB_CASE_TITLE, 'UTF-8');
                $formatted[] = $left.'-'.$right;
                continue;
            }

            $lower = mb_strtolower($word, 'UTF-8');

            if (in_array($lower, $romanNumerals, true)) {
                $formatted[] = mb_strtoupper($lower, 'UTF-8');
                continue;
            }

            if ($index > 0 && in_array($lower, $lowercaseWords, true)) {
                $formatted[] = $lower;
                continue;
            }

            $formatted[] = mb_convert_case($lower, MB_CASE_TITLE, 'UTF-8');
        }

        return implode(' ', $formatted).$suffix;
    }
};
