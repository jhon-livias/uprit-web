<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('docentes', function (Blueprint $table) {
            $table->boolean('es_investigador')->default(false)->after('imagen');
            $table->unsignedSmallInteger('orden_investigacion')->nullable()->after('es_investigador');
            $table->text('resumen_investigacion')->nullable()->after('orden_investigacion');
        });

        $this->seedDocentesInvestigadores();
    }

    public function down(): void
    {
        Schema::table('docentes', function (Blueprint $table) {
            $table->dropColumn(['es_investigador', 'orden_investigacion', 'resumen_investigacion']);
        });
    }

    private function seedDocentesInvestigadores(): void
    {
        $investigadores = [
            [
                'nombre' => 'Luigi Italo Villena Zapata',
                'imagen' => 'web/imagenes/do1.png',
                'resumen_investigacion' => 'Doctor en Estadística Matemática por la Universidad Nacional del Santa (primer puesto de su promoción), Ingeniero Estadístico',
                'tags' => ['Docente', 'Investigación'],
                'orden_investigacion' => 1,
            ],
            [
                'nombre' => 'Carlos Alza Collantes',
                'imagen' => 'web/imagenes/do2.jpg',
                'resumen_investigacion' => 'Doctor en Educación. Maestro en Mediación y Arbitraje en la Práctica Comercial por la Universidad de Salamanca- España',
                'tags' => ['Docente', 'Investigación'],
                'orden_investigacion' => 2,
            ],
            [
                'nombre' => 'Charlen Máximo Calero Huamán',
                'imagen' => 'web/imagenes/do3.jpg',
                'resumen_investigacion' => 'Docente universitario e investigador con sólida trayectoria en Ingeniería Industrial y Maestría en Ingeniería de Sistemas',
                'tags' => ['Docente', 'Investigación'],
                'orden_investigacion' => 3,
            ],
            [
                'nombre' => 'Renzo Jesus Maldonado Gomez',
                'imagen' => 'web/imagenes/do4.png',
                'resumen_investigacion' => 'Doctor en Educación por la Universidad César Vallejo, Grado de Maestro: Derecho Civil Empresarial',
                'tags' => ['Docente', 'Investigación'],
                'orden_investigacion' => 4,
            ],
            [
                'nombre' => 'Mirtha Zulema Armas Chang',
                'imagen' => 'web/imagenes/do5.png',
                'resumen_investigacion' => 'Licenciada en Administración, egresada de la Universidad Nacional de Trujillo',
                'tags' => ['Docente', 'Investigación'],
                'orden_investigacion' => 5,
            ],
            [
                'nombre' => 'Olenka Ana Catherine Espinoza Rodriguez',
                'imagen' => 'web/imagenes/do6.png',
                'resumen_investigacion' => 'Economista, Doctora en Educación y Docente investigadora Renacyt. Con 11 años de experiencia en la administración pública.',
                'tags' => ['Docente', 'Investigación'],
                'orden_investigacion' => 6,
            ],
            [
                'nombre' => 'Marco Antonio Sevilla Gamarra',
                'imagen' => 'web/imagenes/do7.jpg',
                'resumen_investigacion' => 'Post Doctor Universidad del Oriente-Cancún México, en Educación e Investigación, Doctor en Administración',
                'tags' => ['Docente', 'Investigación'],
                'orden_investigacion' => 7,
            ],
            [
                'nombre' => 'Jacqueline Roxana Romero Reyna',
                'imagen' => 'web/imagenes/do8.png',
                'resumen_investigacion' => 'Doctora en Psicología por la Universidad César Vallejo. Investigadora RENACYT Nivel VI, reconocida por CONCYTEC',
                'tags' => ['Docente', 'Investigación'],
                'orden_investigacion' => 8,
            ],
        ];

        $now = now();

        foreach ($investigadores as $data) {
            $existing = DB::table('docentes')
                ->where('nombre', $data['nombre'])
                ->first();

            $payload = [
                'es_investigador' => true,
                'orden_investigacion' => $data['orden_investigacion'],
                'resumen_investigacion' => $data['resumen_investigacion'],
                'updated_at' => $now,
            ];

            if ($existing) {
                if (empty($existing->imagen)) {
                    $payload['imagen'] = $data['imagen'];
                }

                $existingTags = json_decode($existing->tags ?? '[]', true);
                if (!is_array($existingTags) || $existingTags === []) {
                    $payload['tags'] = json_encode($data['tags']);
                }

                DB::table('docentes')->where('id', $existing->id)->update($payload);
                continue;
            }

            DB::table('docentes')->insert([
                'nombre' => $data['nombre'],
                'tags' => json_encode($data['tags']),
                'correo' => null,
                'departamento' => null,
                'descripcion' => null,
                'linkedin' => null,
                'imagen' => $data['imagen'],
                'es_investigador' => true,
                'orden_investigacion' => $data['orden_investigacion'],
                'resumen_investigacion' => $data['resumen_investigacion'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
};
