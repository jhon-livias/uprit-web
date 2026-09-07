<?php

namespace App\Console\Commands;

use App\Models\Carrera;
use App\Models\CarreraDescripcion;
use App\Models\CarreraMalla;
use App\Models\CarreraPerfilEgresado;
use App\Models\CarreraPregunta;
use App\Services\WebNavigationCache;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ReplicateCarrera extends Command
{
    protected $signature = 'carrera:replicate {source : ID de la carrera origen} {target : ID de la carrera destino}';

    protected $description = 'Copia la información editable de una carrera a otra (sin cambiar nombre ni categoría)';

    public function handle(): int
    {
        $sourceId = (int) $this->argument('source');
        $targetId = (int) $this->argument('target');

        if ($sourceId <= 0 || $targetId <= 0 || $sourceId === $targetId) {
            $this->error('Debes indicar dos IDs de carrera distintos y mayores que cero.');

            return self::FAILURE;
        }

        $source = Carrera::with(['detalle_descripcion', 'perfilEgresado', 'preguntas', 'malla', 'docentes'])
            ->find($sourceId);

        if (! $source) {
            $this->error("No existe la carrera origen con id {$sourceId}.");

            return self::FAILURE;
        }

        $target = Carrera::find($targetId);

        if (! $target) {
            $this->error("No existe la carrera destino con id {$targetId}.");

            return self::FAILURE;
        }

        DB::transaction(function () use ($source, $target): void {
            $target->descripcion = $source->descripcion;
            $target->admision = $source->admision;
            $target->duracion = $source->duracion;
            $target->grado_obtenido = $source->grado_obtenido;
            $target->titulacion = $source->titulacion;
            $target->modalidades = $source->modalidades;
            $target->brochure = $source->brochure;
            $target->imagen = $source->imagen;
            $target->imagen_banner = $source->imagen_banner;
            $target->visible_in_nav = $source->visible_in_nav;
            $target->save();

            if ($source->detalle_descripcion) {
                CarreraDescripcion::updateOrCreate(
                    ['carrera_id' => $target->id],
                    [
                        'descripcion' => $source->detalle_descripcion->descripcion,
                        'titulo_oportunidades' => $source->detalle_descripcion->titulo_oportunidades,
                        'oportunidades' => $source->detalle_descripcion->oportunidades,
                    ]
                );
            } else {
                CarreraDescripcion::where('carrera_id', $target->id)->delete();
            }

            if ($source->perfilEgresado) {
                CarreraPerfilEgresado::updateOrCreate(
                    ['carrera_id' => $target->id],
                    ['descripcion' => $source->perfilEgresado->descripcion]
                );
            } else {
                CarreraPerfilEgresado::where('carrera_id', $target->id)->delete();
            }

            CarreraPregunta::where('carrera_id', $target->id)->delete();
            foreach ($source->preguntas as $pregunta) {
                CarreraPregunta::create([
                    'carrera_id' => $target->id,
                    'pregunta' => $pregunta->pregunta,
                    'respuesta' => $pregunta->respuesta,
                ]);
            }

            CarreraMalla::where('carrera_id', $target->id)->delete();
            foreach ($source->malla as $ciclo) {
                CarreraMalla::create([
                    'carrera_id' => $target->id,
                    'ciclo' => $ciclo->ciclo,
                    'descripcion' => $ciclo->descripcion,
                    'cursos' => $ciclo->cursos,
                ]);
            }

            $target->docentes()->sync($source->docentes->pluck('id')->all());
        });

        WebNavigationCache::forget();

        $this->info("Información copiada: {$source->id} ({$source->nombre}) -> {$target->id} ({$target->nombre})");

        return self::SUCCESS;
    }
}
