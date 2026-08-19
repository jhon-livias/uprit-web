<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private const MARIETTA_IMPORT_IDS = [9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20];

    /** Carreras Educación en Ciencias Naturales y Tecnología (regular y puede). */
    private const CARRERAS_CNyT = [11, 30];

    public function up(): void
    {
        $this->fixFaqOrtografia();
        $this->fixSteamToSteam();
        $this->normalizeMallaCarrera2();
        $this->fixMallaCarrera11();
        $this->fixDocenteTags();
        $this->ensureModalidadesEnCarreras();
        $this->addTransparenciaTasas2026();
        $this->markObservacionesEnRevision();
    }

    public function down(): void
    {
        if (! Schema::hasTable('observaciones')) {
            return;
        }

        DB::table('observaciones')
            ->whereIn('import_id', self::MARIETTA_IMPORT_IDS)
            ->update(['estado' => 'pendiente', 'updated_at' => now()]);
    }

    private function fixFaqOrtografia(): void
    {
        if (! Schema::hasTable('carrera_preguntas')) {
            return;
        }

        $preguntaReplacements = [
            '¿Que requisitos' => '¿Qué requisitos',
            '¿Que competencias' => '¿Qué competencias',
            '¿En que facultad' => '¿En qué facultad',
            '¿En que ciclo' => '¿En qué ciclo',
            '¿En que ciclos' => '¿En qué ciclos',
            '¿Qué titulo' => '¿Qué título',
            '¿El titulo' => '¿El título',
            'practicas obligatorias' => 'prácticas obligatorias',
            'practicas profesionales' => 'prácticas profesionales',
            'practicas preprofesionales' => 'prácticas preprofesionales',
            'practicas docente' => 'prácticas docente',
            'practicas docentes' => 'prácticas docentes',
            'Existen practicas' => '¿Existen prácticas',
            'Se requieren practicas' => 'Se requieren prácticas',
            'Se realizan practicas' => 'Se realizan prácticas',
            'numero máximo' => 'número máximo',
            'convalidad al' => 'convalidar al',
            'maestria' => 'maestría',
        ];

        $rows = DB::table('carrera_preguntas')->get(['id', 'pregunta']);

        foreach ($rows as $row) {
            $pregunta = $row->pregunta;

            foreach ($preguntaReplacements as $search => $replace) {
                $pregunta = str_ireplace($search, $replace, $pregunta);
            }

            if ($pregunta !== $row->pregunta) {
                DB::table('carrera_preguntas')
                    ->where('id', $row->id)
                    ->update(['pregunta' => $pregunta, 'updated_at' => now()]);
            }
        }

        DB::table('carrera_preguntas')
            ->where('carrera_id', 12)
            ->where('pregunta', 'like', '%requisitos debo cumplir para iniciar el proceso de convalidación%')
            ->update([
                'respuesta' => 'Necesitarás presentar una solicitud formal, tu historial académico original, certificados de notas, y los sílabos de cada curso que deseas convalidar. Estos documentos deben estar firmados y sellados por la institución de procedencia.',
                'updated_at' => now(),
            ]);
    }

    private function fixSteamToSteam(): void
    {
        $replacements = [
            'enfoque STEM' => 'enfoque STEAM',
            'el enfoque STEM' => 'el enfoque STEAM',
            '(STEM,' => '(STEAM,',
        ];

        foreach (['carreras' => 'descripcion', 'carrera_descripcion' => 'descripcion', 'carrera_perfil_egresado' => 'descripcion'] as $table => $column) {
            if (! Schema::hasTable($table) || ! Schema::hasColumn($table, $column)) {
                continue;
            }

            $query = DB::table($table)->where($column, 'like', '%STEM%');

            if ($table !== 'carreras') {
                $query->whereIn('carrera_id', self::CARRERAS_CNyT);
            } else {
                $query->whereIn('id', self::CARRERAS_CNyT);
            }

            foreach ($query->get(['id', $column]) as $row) {
                $text = $row->{$column};

                foreach ($replacements as $search => $replace) {
                    $text = str_replace($search, $replace, $text);
                }

                if ($text !== $row->{$column}) {
                    DB::table($table)->where('id', $row->id)->update([
                        $column => $text,
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }

    private function normalizeMallaCarrera2(): void
    {
        if (! Schema::hasTable('carrera_malla_curricular')) {
            return;
        }

        $rows = DB::table('carrera_malla_curricular')
            ->where('carrera_id', 2)
            ->get(['id', 'ciclo', 'cursos']);

        foreach ($rows as $row) {
            $ciclo = preg_replace('/^CICLO/i', 'Ciclo', $row->ciclo) ?? $row->ciclo;
            $cursos = json_decode($row->cursos ?? '[]', true);

            if (! is_array($cursos)) {
                continue;
            }

            $cursos = array_map(
                fn (string $curso) => $this->tituloPalabra($curso),
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

    private function fixMallaCarrera11(): void
    {
        if (! Schema::hasTable('carrera_malla_curricular')) {
            return;
        }

        DB::table('carrera_malla_curricular')
            ->where('carrera_id', 11)
            ->where('ciclo', 'Ciclo I')
            ->update([
                'cursos' => json_encode([
                    'Matemática básica',
                    'Comunicación',
                    'Lógica general',
                    'Historia del Perú en el contexto mundial contemporáneo',
                    'Pedagogía general',
                    'Fundamentos de las ciencias naturales',
                ], JSON_UNESCAPED_UNICODE),
                'updated_at' => now(),
            ]);

        DB::table('carrera_malla_curricular')
            ->where('carrera_id', 11)
            ->where('ciclo', 'Ciclo VI')
            ->update([
                'descripcion' => 'Abarcar zoología, química orgánica, educación alimentaria, e-learning y anatomía humana.',
                'updated_at' => now(),
            ]);
    }

    private function fixDocenteTags(): void
    {
        if (! Schema::hasTable('docentes')) {
            return;
        }

        $docentes = DB::table('docentes')->get(['id', 'tags']);

        foreach ($docentes as $docente) {
            $tags = json_decode($docente->tags ?? '[]', true);

            if (! is_array($tags)) {
                continue;
            }

            $fixed = array_map(
                static fn (string $tag) => $tag === 'Docecnte' ? 'Docente' : $tag,
                $tags
            );

            if ($fixed !== $tags) {
                DB::table('docentes')
                    ->where('id', $docente->id)
                    ->update([
                        'tags' => json_encode($fixed, JSON_UNESCAPED_UNICODE),
                        'updated_at' => now(),
                    ]);
            }
        }
    }

    private function ensureModalidadesEnCarreras(): void
    {
        if (! Schema::hasTable('carreras') || ! Schema::hasColumn('carreras', 'modalidades')) {
            return;
        }

        $carreras = DB::table('carreras')
            ->where(function ($query) {
                $query->whereNull('modalidades')
                    ->orWhere('modalidades', '');
            })
            ->get(['id', 'nombre']);

        foreach ($carreras as $carrera) {
            $modalidad = str_contains($carrera->nombre, 'Distancia') || str_contains($carrera->nombre, 'Virtual')
                ? 'A Distancia'
                : (str_contains($carrera->nombre, 'Semipresencial') ? 'Semipresencial' : 'Presencial');

            DB::table('carreras')
                ->where('id', $carrera->id)
                ->update([
                    'modalidades' => $modalidad,
                    'updated_at' => now(),
                ]);
        }
    }

    private function addTransparenciaTasas2026(): void
    {
        if (! Schema::hasTable('transparencia_secciones') || ! Schema::hasTable('transparencia_documentos')) {
            return;
        }

        $seccion = DB::table('transparencia_secciones')
            ->where('titulo', 'like', '%TASAS EDUCATIVAS%')
            ->orWhere('titulo', 'like', '%Tasas educativas%')
            ->first();

        if (! $seccion) {
            return;
        }

        $exists = DB::table('transparencia_documentos')
            ->where('seccion_id', $seccion->id)
            ->where('etiqueta', 'like', '%2026%')
            ->exists();

        if ($exists) {
            return;
        }

        $maxOrden = (int) DB::table('transparencia_documentos')
            ->where('seccion_id', $seccion->id)
            ->max('orden');

        DB::table('transparencia_documentos')->insert([
            'seccion_id' => $seccion->id,
            'etiqueta' => 'Tasas Educativas 2026',
            'url' => null,
            'archivo' => null,
            'orden' => $maxOrden + 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function markObservacionesEnRevision(): void
    {
        if (! Schema::hasTable('observaciones')) {
            return;
        }

        DB::table('observaciones')
            ->whereIn('import_id', self::MARIETTA_IMPORT_IDS)
            ->update(['estado' => 'en_revision', 'updated_at' => now()]);
    }

    private function tituloPalabra(string $text): string
    {
        $text = trim($text);

        if ($text === '') {
            return $text;
        }

        return mb_convert_case(mb_strtolower($text, 'UTF-8'), MB_CASE_TITLE, 'UTF-8');
    }
};
