<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private const NOMBRES = ['Educación Primaria'];

    private const SUBTITULO = 'Gestiona procesos de aprendizaje integrales, inclusivos y pertinentes, considerando la diversidad y contexto sociocultural. Integra herramientas y recursos tecnológicos para fortalecer los aprendizajes, planifica y evalúa experiencias educativas orientadas al desarrollo de competencias.';

    private const DESCRIPCION = 'La carrera de Educación Primaria en la UPRIT forma docentes innovadores, creativos y comprometidos con el desarrollo integral de sus estudiantes. Desde los primeros ciclos, combina la formación pedagógica con experiencias prácticas en áreas como Comunicación, Matemática, Ciencia y Arte, incorporando recursos como robótica, inteligencia artificial y entornos virtuales de aprendizaje. Asimismo, promueve una formación intercultural, que valora la diversidad cultural y lingüística del país e integra el aprendizaje del quechua como parte de la preparación profesional.';

    public function up(): void
    {
        if (! Schema::hasTable('carreras')) {
            return;
        }

        $ids = DB::table('carreras')
            ->join('categorias', 'categorias.id', '=', 'carreras.categoria_id')
            ->whereIn('carreras.nombre', self::NOMBRES)
            ->whereIn('categorias.nivel_academico_id', [3, 4])
            ->pluck('carreras.id')
            ->map(fn ($id) => (int) $id)
            ->all();

        if ($ids === []) {
            return;
        }

        DB::table('carreras')
            ->whereIn('id', $ids)
            ->update([
                'descripcion' => self::SUBTITULO,
                'updated_at' => now(),
            ]);

        if (! Schema::hasTable('carrera_descripcion')) {
            return;
        }

        foreach ($ids as $carreraId) {
            $existe = DB::table('carrera_descripcion')
                ->where('carrera_id', $carreraId)
                ->exists();

            if ($existe) {
                DB::table('carrera_descripcion')
                    ->where('carrera_id', $carreraId)
                    ->update([
                        'descripcion' => self::DESCRIPCION,
                        'updated_at' => now(),
                    ]);

                continue;
            }

            DB::table('carrera_descripcion')->insert([
                'carrera_id' => $carreraId,
                'descripcion' => self::DESCRIPCION,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        // Contenido editorial no reversible de forma segura.
    }
};
