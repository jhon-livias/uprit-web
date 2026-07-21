<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 150);
            $table->json('tags')->nullable();
            $table->string('correo', 150)->nullable();
            $table->string('departamento', 250)->nullable();
            $table->longText('descripcion')->nullable();
            $table->string('linkedin', 250)->nullable();
            $table->string('imagen', 250)->nullable();
            $table->timestamps();
        });

        Schema::create('carrera_docente', function (Blueprint $table) {
            $table->unsignedBigInteger('carrera_id');
            $table->unsignedBigInteger('docente_id');
            $table->primary(['carrera_id', 'docente_id']);
        });

        if (Schema::hasTable('carrera_docentes')) {
            $this->migrateLegacyDocentes();
            Schema::drop('carrera_docentes');
        }
    }

    public function down(): void
    {
        Schema::create('carrera_docentes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carrera_id');
            $table->string('nombre', 150);
            $table->json('tags')->nullable();
            $table->string('correo', 150)->nullable();
            $table->string('departamento', 250)->nullable();
            $table->longText('descripcion')->nullable();
            $table->string('linkedin', 250)->nullable();
            $table->string('imagen', 250)->nullable();
            $table->timestamps();
        });

        if (Schema::hasTable('docentes') && Schema::hasTable('carrera_docente')) {
            $docentes = DB::table('docentes')->get();

            foreach ($docentes as $docente) {
                $carreraIds = DB::table('carrera_docente')
                    ->where('docente_id', $docente->id)
                    ->pluck('carrera_id');

                foreach ($carreraIds as $carreraId) {
                    DB::table('carrera_docentes')->insert([
                        'carrera_id' => $carreraId,
                        'nombre' => $docente->nombre,
                        'tags' => $docente->tags,
                        'correo' => $docente->correo,
                        'departamento' => $docente->departamento,
                        'descripcion' => $docente->descripcion,
                        'linkedin' => $docente->linkedin,
                        'imagen' => $docente->imagen,
                        'created_at' => $docente->created_at,
                        'updated_at' => $docente->updated_at,
                    ]);
                }
            }
        }

        Schema::dropIfExists('carrera_docente');
        Schema::dropIfExists('docentes');
    }

    private function migrateLegacyDocentes(): void
    {
        $legacyRows = DB::table('carrera_docentes')->orderBy('id')->get();
        $docenteMap = [];

        foreach ($legacyRows as $row) {
            $key = $this->docenteKey($row->correo, $row->nombre);

            if (!isset($docenteMap[$key])) {
                $docenteId = DB::table('docentes')->insertGetId([
                    'nombre' => $row->nombre,
                    'tags' => $row->tags,
                    'correo' => $row->correo,
                    'departamento' => $row->departamento,
                    'descripcion' => $row->descripcion,
                    'linkedin' => $row->linkedin,
                    'imagen' => $row->imagen,
                    'created_at' => $row->created_at,
                    'updated_at' => $row->updated_at,
                ]);

                $docenteMap[$key] = $docenteId;
            } else {
                $docenteId = $docenteMap[$key];
                $existing = DB::table('docentes')->where('id', $docenteId)->first();

                DB::table('docentes')->where('id', $docenteId)->update([
                    'departamento' => $existing->departamento ?: $row->departamento,
                    'descripcion' => strlen((string) $existing->descripcion) >= strlen((string) $row->descripcion)
                        ? $existing->descripcion
                        : $row->descripcion,
                    'linkedin' => $existing->linkedin ?: $row->linkedin,
                    'imagen' => $existing->imagen ?: $row->imagen,
                    'tags' => $existing->tags ?: $row->tags,
                    'updated_at' => $row->updated_at,
                ]);
            }

            DB::table('carrera_docente')->insertOrIgnore([
                'carrera_id' => $row->carrera_id,
                'docente_id' => $docenteId,
            ]);
        }
    }

    private function docenteKey(?string $correo, string $nombre): string
    {
        $correo = trim(strtolower((string) $correo));

        if ($correo !== '') {
            return 'correo:' . $correo;
        }

        return 'nombre:' . mb_strtolower(trim($nombre));
    }
};
