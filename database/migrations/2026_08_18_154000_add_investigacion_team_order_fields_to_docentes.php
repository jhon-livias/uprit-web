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
            $table->string('rol_investigacion', 30)->nullable()->after('orden_investigacion');
            $table->char('genero', 1)->nullable()->after('rol_investigacion');
            $table->string('titulo_academico', 20)->nullable()->after('genero');
        });

        $this->seedInvestigacionTeamMetadata();
    }

    public function down(): void
    {
        Schema::table('docentes', function (Blueprint $table) {
            $table->dropColumn(['rol_investigacion', 'genero', 'titulo_academico']);
        });
    }

    private function seedInvestigacionTeamMetadata(): void
    {
        $team = [
            [
                'nombre' => 'Marco Antonio Sevilla Gamarra',
                'rol_investigacion' => 'director',
                'genero' => 'M',
                'titulo_academico' => 'Dr.',
                'orden_investigacion' => 1,
            ],
            [
                'nombre' => 'Olenka Ana Catherine Espinoza Rodriguez',
                'rol_investigacion' => 'coordinadora',
                'genero' => 'F',
                'titulo_academico' => 'Dra.',
                'orden_investigacion' => 2,
            ],
            [
                'nombre' => 'Mirtha Zulema Armas Chang',
                'rol_investigacion' => 'docente',
                'genero' => 'F',
                'titulo_academico' => 'Dra.',
                'orden_investigacion' => 3,
            ],
            [
                'nombre' => 'Jacqueline Roxana Romero Reyna',
                'rol_investigacion' => 'docente',
                'genero' => 'F',
                'titulo_academico' => 'Dra.',
                'orden_investigacion' => 4,
            ],
            [
                'nombre' => 'Carlos Alza Collantes',
                'rol_investigacion' => 'docente',
                'genero' => 'M',
                'titulo_academico' => 'Dr.',
                'orden_investigacion' => 5,
            ],
            [
                'nombre' => 'Charlen Máximo Calero Huamán',
                'rol_investigacion' => 'docente',
                'genero' => 'M',
                'titulo_academico' => 'Mg.',
                'orden_investigacion' => 6,
            ],
            [
                'nombre' => 'Luigi Italo Villena Zapata',
                'rol_investigacion' => 'docente',
                'genero' => 'M',
                'titulo_academico' => 'Dr.',
                'orden_investigacion' => 7,
            ],
            [
                'nombre' => 'Renzo Jesus Maldonado Gomez',
                'rol_investigacion' => 'docente',
                'genero' => 'M',
                'titulo_academico' => 'Dr.',
                'orden_investigacion' => 8,
            ],
        ];

        $now = now();

        foreach ($team as $member) {
            DB::table('docentes')
                ->where('nombre', $member['nombre'])
                ->where('es_investigador', true)
                ->update([
                    'rol_investigacion' => $member['rol_investigacion'],
                    'genero' => $member['genero'],
                    'titulo_academico' => $member['titulo_academico'],
                    'orden_investigacion' => $member['orden_investigacion'],
                    'updated_at' => $now,
                ]);
        }
    }
};
