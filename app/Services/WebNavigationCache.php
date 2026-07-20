<?php

namespace App\Services;

use App\Models\Categoria;
use App\Models\Carrera;
use App\Models\NivelAcademico;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class WebNavigationCache
{
    public const KEY_NIVEL_ACADEMICO = 'web.nav.nivel_academico';

    public const KEY_MENU_PREGRADO = 'web.nav.menu.pregrado';

    public const KEY_MENU_PREGRADO_PUEDE = 'web.nav.menu.pregrado_puede';

    public const KEY_MENU_POSGRADO = 'web.nav.menu.posgrado';

    public const KEY_CHATBOT_PREGRADO = 'web.nav.chatbot.pregrado';

    public const KEY_CHATBOT_PREGRADO_PUEDE = 'web.nav.chatbot.pregrado_puede';

    public const KEY_CHATBOT_POSGRADO = 'web.nav.chatbot.posgrado';

    /** @var list<string> */
    private const ALL_KEYS = [
        self::KEY_NIVEL_ACADEMICO,
        self::KEY_MENU_PREGRADO,
        self::KEY_MENU_PREGRADO_PUEDE,
        self::KEY_MENU_POSGRADO,
        self::KEY_CHATBOT_PREGRADO,
        self::KEY_CHATBOT_PREGRADO_PUEDE,
        self::KEY_CHATBOT_POSGRADO,
    ];

    public static function ttl(): int
    {
        return (int) env('WEB_NAV_CACHE_TTL', 3600);
    }

    public static function forget(): void
    {
        foreach (self::ALL_KEYS as $key) {
            Cache::forget($key);
        }
    }

    /**
     * @return array<string, mixed>
     */
    public static function sharedViewData(): array
    {
        return [
            'nivelAcademico' => self::nivelAcademico(),
            'pregradoCategorias' => self::menuPregrado(),
            'pregradoPuedeCategorias' => self::menuPregradoPuede(),
            'posgradoCategorias' => self::menuPosgrado(),
            'chatbotPregradoCategorias' => self::chatbotPregrado(),
            'chatbotPregradoPuedeCategorias' => self::chatbotPregradoPuede(),
            'chatbotPosgradoCategorias' => self::chatbotPosgrado(),
        ];
    }

    private static function rememberCollection(string $key, callable $callback): Collection
    {
        $value = Cache::remember($key, self::ttl(), $callback);

        return $value instanceof Collection ? $value : collect($value);
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    private static function rememberArray(string $key, callable $callback): array
    {
        $value = Cache::remember($key, self::ttl(), $callback);

        return is_array($value) ? $value : [];
    }

    public static function nivelAcademico(): Collection
    {
        return self::rememberCollection(
            self::KEY_NIVEL_ACADEMICO,
            fn () => NivelAcademico::query()->orderBy('id')->get()
        );
    }

    public static function menuPregrado(): Collection
    {
        return self::rememberCollection(
            self::KEY_MENU_PREGRADO,
            fn () => self::queryMenuByNivel('Pregrado', withHijos: false)
        );
    }

    public static function menuPregradoPuede(): Collection
    {
        return self::rememberCollection(
            self::KEY_MENU_PREGRADO_PUEDE,
            fn () => self::queryMenuByNivel('Pregrado Puede', withHijos: false)
        );
    }

    public static function menuPosgrado(): Collection
    {
        return self::rememberCollection(
            self::KEY_MENU_POSGRADO,
            fn () => self::queryMenuByNivel('Posgrado', withHijos: true)
        );
    }

    public static function chatbotPregrado(): array
    {
        return self::rememberArray(
            self::KEY_CHATBOT_PREGRADO,
            fn () => self::buildChatbotByNivel('Pregrado', withHijos: false)
        );
    }

    public static function chatbotPregradoPuede(): array
    {
        return self::rememberArray(
            self::KEY_CHATBOT_PREGRADO_PUEDE,
            fn () => self::buildChatbotByNivel('Pregrado Puede', withHijos: false)
        );
    }

    public static function chatbotPosgrado(): array
    {
        return self::rememberArray(
            self::KEY_CHATBOT_POSGRADO,
            fn () => self::buildChatbotByNivel('Posgrado', withHijos: true)
        );
    }

    private static function queryMenuByNivel(string $nivelNombre, bool $withHijos): Collection
    {
        $carreraColumns = ['id', 'categoria_id', 'nombre'];
        $categoriaColumns = ['id', 'nombre', 'nivel_academico_id', 'padre_id'];

        $query = Categoria::query()
            ->select($categoriaColumns)
            ->whereNull('padre_id')
            ->whereHas('nivelAcademico', fn ($q) => $q->where('nombre', $nivelNombre));

        if ($withHijos) {
            return $query
                ->with([
                    'hijos' => fn ($q) => $q->select($categoriaColumns)->orderBy('nombre'),
                    'hijos.carreras' => fn ($q) => $q->select($carreraColumns)->orderBy('nombre'),
                ])
                ->orderBy('nombre')
                ->get();
        }

        return $query
            ->with([
                'carreras' => fn ($q) => $q->select($carreraColumns)->orderBy('nombre'),
                'hijos' => fn ($q) => $q->select($categoriaColumns)->orderBy('nombre'),
                'hijos.carreras' => fn ($q) => $q->select($carreraColumns)->orderBy('nombre'),
            ])
            ->orderBy('nombre')
            ->get();
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    private static function buildChatbotByNivel(string $nivelNombre, bool $withHijos): array
    {
        $categoriaColumns = ['id', 'nombre', 'padre_id'];
        $carreraColumns = [
            'id',
            'categoria_id',
            'nombre',
            'admision',
            'duracion',
            'grado_obtenido',
            'titulacion',
            'modalidades',
        ];

        $carreraRelationConstraints = [
            'carreras.detalle_descripcion' => fn ($q) => $q->select('carrera_id', 'descripcion', 'oportunidades'),
            'carreras.perfilEgresado' => fn ($q) => $q->select('carrera_id', 'descripcion'),
            'carreras.docentes' => fn ($q) => $q->select('carrera_id', 'nombre', 'tags', 'correo', 'departamento')->orderBy('id'),
            'carreras.malla' => fn ($q) => $q->select('carrera_id', 'ciclo', 'descripcion', 'cursos')->orderBy('id'),
            'carreras.preguntas' => fn ($q) => $q->select('carrera_id', 'pregunta', 'respuesta')->orderBy('id'),
            'hijos.carreras.detalle_descripcion' => fn ($q) => $q->select('carrera_id', 'descripcion', 'oportunidades'),
            'hijos.carreras.perfilEgresado' => fn ($q) => $q->select('carrera_id', 'descripcion'),
            'hijos.carreras.docentes' => fn ($q) => $q->select('carrera_id', 'nombre', 'tags', 'correo', 'departamento')->orderBy('id'),
            'hijos.carreras.malla' => fn ($q) => $q->select('carrera_id', 'ciclo', 'descripcion', 'cursos')->orderBy('id'),
            'hijos.carreras.preguntas' => fn ($q) => $q->select('carrera_id', 'pregunta', 'respuesta')->orderBy('id'),
        ];

        $query = Categoria::query()
            ->select($withHijos ? ['id', 'nombre'] : $categoriaColumns)
            ->whereNull('padre_id')
            ->whereHas('nivelAcademico', fn ($q) => $q->where('nombre', $nivelNombre))
            ->orderBy('nombre');

        if ($withHijos) {
            $query->with(array_merge([
                'hijos' => fn ($q) => $q->select(['id', 'nombre', 'padre_id'])->orderBy('nombre'),
                'hijos.carreras' => fn ($q) => $q->select($carreraColumns)->orderBy('nombre'),
            ], $carreraRelationConstraints));

            return $query->get()
                ->map(fn (Categoria $categoria) => [
                    'id' => $categoria->id,
                    'nombre' => $categoria->nombre,
                    'hijos' => $categoria->hijos
                        ->map(fn (Categoria $hijo) => [
                            'id' => $hijo->id,
                            'nombre' => $hijo->nombre,
                            'carreras' => $hijo->carreras
                                ->map(fn ($carrera) => self::mapCarreraForChatbot($carrera))
                                ->values()
                                ->all(),
                        ])
                        ->values()
                        ->all(),
                ])
                ->values()
                ->all();
        }

        $query->with(array_merge([
            'carreras' => fn ($q) => $q->select($carreraColumns)->orderBy('nombre'),
        ], array_filter(
            $carreraRelationConstraints,
            fn (string $key) => str_starts_with($key, 'carreras.'),
            ARRAY_FILTER_USE_KEY
        )));

        return $query->get()
            ->map(fn (Categoria $categoria) => [
                'id' => $categoria->id,
                'nombre' => $categoria->nombre,
                'carreras' => $categoria->carreras
                    ->map(fn ($carrera) => self::mapCarreraForChatbot($carrera))
                    ->values()
                    ->all(),
            ])
            ->values()
            ->all();
    }

    /**
     * @return array<string, mixed>
     */
    private static function mapCarreraForChatbot(Carrera $carrera): array
    {
        $payload = [
            'id' => $carrera->id,
            'categoria_id' => $carrera->categoria_id,
            'nombre' => $carrera->nombre,
            'admision' => $carrera->admision,
            'duracion' => $carrera->duracion,
            'grado_obtenido' => $carrera->grado_obtenido,
            'titulacion' => $carrera->titulacion,
            'modalidades' => $carrera->modalidades,
            'docentes' => [],
            'malla' => [],
            'preguntas' => [],
        ];

        if ($carrera->relationLoaded('detalle_descripcion') && $carrera->detalle_descripcion) {
            $payload['detalle_descripcion'] = [
                'descripcion' => $carrera->detalle_descripcion->descripcion,
                'oportunidades' => $carrera->detalle_descripcion->oportunidades ?? [],
            ];
        }

        if ($carrera->relationLoaded('perfilEgresado') && $carrera->perfilEgresado) {
            $payload['perfil_egresado'] = [
                'descripcion' => $carrera->perfilEgresado->descripcion,
            ];
        }

        if ($carrera->relationLoaded('docentes')) {
            $payload['docentes'] = $carrera->docentes
                ->map(fn ($docente) => [
                    'nombre' => $docente->nombre,
                    'tags' => $docente->tags,
                    'correo' => $docente->correo,
                    'departamento' => $docente->departamento,
                ])
                ->values()
                ->all();
        }

        if ($carrera->relationLoaded('malla')) {
            $payload['malla'] = $carrera->malla
                ->map(fn ($ciclo) => [
                    'ciclo' => $ciclo->ciclo,
                    'descripcion' => $ciclo->descripcion,
                    'cursos' => $ciclo->cursos ?? [],
                ])
                ->values()
                ->all();
        }

        if ($carrera->relationLoaded('preguntas')) {
            $payload['preguntas'] = $carrera->preguntas
                ->map(fn ($pregunta) => [
                    'pregunta' => $pregunta->pregunta,
                    'respuesta' => $pregunta->respuesta,
                ])
                ->values()
                ->all();
        }

        return $payload;
    }
}
