<?php

namespace App\Services;

use App\Models\Categoria;
use App\Models\Carrera;
use App\Models\NavGroup;
use App\Models\NivelAcademico;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

class WebNavigationCache
{
    public const KEY_NIVEL_ACADEMICO = 'web.nav.nivel_academico';

    public const KEY_MENU_PREGRADO = 'web.nav.menu.pregrado';

    public const KEY_MENU_PREGRADO_PUEDE = 'web.nav.menu.pregrado_puede';

    public const KEY_MENU_SEGUNDA_ESPECIALIDAD = 'web.nav.menu.segunda_especialidad';

    public const KEY_MENU_POSGRADO = 'web.nav.menu.posgrado';

    public const KEY_CHATBOT_PREGRADO = 'web.nav.chatbot.pregrado';

    public const KEY_CHATBOT_PREGRADO_PUEDE = 'web.nav.chatbot.pregrado_puede';

    public const KEY_CHATBOT_POSGRADO = 'web.nav.chatbot.posgrado';

    public const KEY_NAV_GROUPS = 'web.nav.groups';

    public const KEY_CAREER_SEARCH = 'web.nav.career_search';

    /** @var list<string> */
    private const ALL_KEYS = [
        self::KEY_NIVEL_ACADEMICO,
        self::KEY_MENU_PREGRADO,
        self::KEY_MENU_PREGRADO_PUEDE,
        self::KEY_MENU_SEGUNDA_ESPECIALIDAD,
        self::KEY_MENU_POSGRADO,
        self::KEY_CHATBOT_PREGRADO,
        self::KEY_CHATBOT_PREGRADO_PUEDE,
        self::KEY_CHATBOT_POSGRADO,
        self::KEY_NAV_GROUPS,
        self::KEY_CAREER_SEARCH,
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
            'segundaEspecialidadCategorias' => self::menuSegundaEspecialidad(),
            'posgradoCategorias' => self::menuPosgrado(),
            'chatbotPregradoCategorias' => self::chatbotPregrado(),
            'chatbotPregradoPuedeCategorias' => self::chatbotPregradoPuede(),
            'chatbotPosgradoCategorias' => self::chatbotPosgrado(),
            'navGroups' => self::navGroups(),
            'navTopbarGroups' => self::navTopbarGroups(),
        ];
    }

    public static function navGroups(): Collection
    {
        try {
            return self::rememberCollection(
                self::KEY_NAV_GROUPS,
                fn () => NavGroup::query()
                    ->with(['links' => fn ($q) => $q->orderBy('orden')])
                    ->orderBy('orden')
                    ->get()
            );
        } catch (\Throwable) {
            return collect();
        }
    }

    public static function navTopbarGroups(): Collection
    {
        return self::navGroups()->where('show_in_topbar', true)->values();
    }

    public static function navMainGroups(): Collection
    {
        return self::navGroups()->where('show_in_main_nav', true)->values();
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

    public static function menuSegundaEspecialidad(): Collection
    {
        return self::rememberCollection(
            self::KEY_MENU_SEGUNDA_ESPECIALIDAD,
            fn () => self::querySegundaEspecialidadMenu()
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
        $categoriaColumns = ['id', 'nombre', 'nivel_academico_id', 'padre_id'];
        $visibleInNav = self::visibleInNavCarrerasRelation();

        $query = Categoria::query()
            ->select($categoriaColumns)
            ->whereNull('padre_id')
            ->whereHas('nivelAcademico', fn ($q) => $q->where('nombre', $nivelNombre));

        if ($withHijos) {
            return self::filterMenuCategorias(
                $query
                    ->with([
                        'hijos' => fn ($q) => $q->select($categoriaColumns)->orderBy('nombre'),
                        'hijos.carreras' => $visibleInNav,
                    ])
                    ->orderBy('nombre')
                    ->get(),
                withHijos: true
            );
        }

        return self::filterMenuCategorias(
            $query
                ->with([
                    'carreras' => $visibleInNav,
                    'hijos' => fn ($q) => $q->select($categoriaColumns)->orderBy('nombre'),
                    'hijos.carreras' => $visibleInNav,
                ])
                ->orderBy('nombre')
                ->get(),
            withHijos: false
        );
    }

    private static function querySegundaEspecialidadMenu(): Collection
    {
        $categoriaColumns = ['id', 'nombre', 'nivel_academico_id', 'padre_id'];
        $visibleInNav = self::visibleInNavCarrerasRelation();

        $root = Categoria::query()
            ->select($categoriaColumns)
            ->where('nombre', 'Segunda Especialidad')
            ->whereNull('padre_id')
            ->whereHas('nivelAcademico', fn ($q) => $q->whereIn('nombre', ['Pregrado', 'Posgrado']))
            ->orderByRaw("CASE WHEN nivel_academico_id = ? THEN 0 ELSE 1 END", [Carrera::NIVEL_PREGRADO])
            ->with([
                'carreras' => $visibleInNav,
                'hijos' => fn ($q) => $q->select($categoriaColumns)->orderBy('nombre'),
                'hijos.carreras' => $visibleInNav,
            ])
            ->first();

        if (! $root) {
            return collect();
        }

        return self::filterMenuCategorias(collect([$root]), withHijos: false);
    }

    /**
     * Oculta subcategorías sin carreras visibles y categorías padre sin contenido activo.
     */
    private static function filterMenuCategorias(Collection $categorias, bool $withHijos): Collection
    {
        return $categorias
            ->map(function (Categoria $categoria) {
                $hijos = $categoria->hijos
                    ->filter(fn (Categoria $hijo) => $hijo->carreras->isNotEmpty())
                    ->values();

                $categoria->setRelation('hijos', $hijos);

                return $categoria;
            })
            ->filter(function (Categoria $categoria) use ($withHijos) {
                if ($withHijos) {
                    return $categoria->hijos->isNotEmpty();
                }

                return $categoria->carreras->isNotEmpty() || $categoria->hijos->isNotEmpty();
            })
            ->values();
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
            'carreras.docentes' => fn ($q) => $q->select('docentes.id', 'docentes.nombre', 'docentes.tags', 'docentes.correo', 'docentes.departamento')->orderBy('docentes.id'),
            'carreras.malla' => fn ($q) => $q->select('carrera_id', 'ciclo', 'descripcion', 'cursos')->orderBy('id'),
            'carreras.preguntas' => fn ($q) => $q->select('carrera_id', 'pregunta', 'respuesta')->orderBy('id'),
            'hijos.carreras.detalle_descripcion' => fn ($q) => $q->select('carrera_id', 'descripcion', 'oportunidades'),
            'hijos.carreras.perfilEgresado' => fn ($q) => $q->select('carrera_id', 'descripcion'),
            'hijos.carreras.docentes' => fn ($q) => $q->select('docentes.id', 'docentes.nombre', 'docentes.tags', 'docentes.correo', 'docentes.departamento')->orderBy('docentes.id'),
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

            return self::filterMenuCategorias($query->get(), withHijos: true)
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

        return self::filterMenuCategorias($query->get(), withHijos: false)
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
            'modalidades' => ($oficiales = modalidades_oficiales($carrera->modalidades))
                ? implode(', ', $oficiales)
                : $carrera->modalidades,
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

    /**
     * Catálogo compacto del buscador público. Se filtra en el navegador.
     *
     * @return array{carreras: list<array<string, mixed>>}
     */
    public static function careerSearchCatalog(): array
    {
        return self::rememberArray(
            self::KEY_CAREER_SEARCH,
            fn () => self::buildCareerSearchCatalog()
        );
    }

    /**
     * @return array{carreras: list<array<string, mixed>>}
     */
    private static function buildCareerSearchCatalog(): array
    {
        $query = Carrera::query()
            ->select(['id', 'categoria_id', 'nombre', 'duracion', 'modalidades'])
            ->with([
                'categoria:id,nombre,nivel_academico_id,padre_id',
                'categoria.nivelAcademico:id,nombre',
                'categoria.padre:id,nombre,padre_id',
            ])
            ->orderBy('nombre');

        if (Schema::hasColumn('carreras', 'visible_in_nav')) {
            $query->where('visible_in_nav', true);
        }

        $carreras = [];

        foreach ($query->get() as $carrera) {
            $item = self::mapCareerSearchItem($carrera);

            if ($item !== null) {
                $carreras[] = $item;
            }
        }

        return ['carreras' => $carreras];
    }

    /**
     * @return array<string, mixed>|null
     */
    private static function mapCareerSearchItem(Carrera $carrera): ?array
    {
        $nombre = trim((string) $carrera->nombre);
        $categoria = $carrera->categoria;

        if ($nombre === '' || $categoria === null) {
            return null;
        }

        $nivel = self::careerSearchNivel($carrera);

        if ($nivel === null) {
            return null;
        }

        $duracion = self::duracionBuscador($carrera->duracion);

        return [
            'id' => $carrera->id,
            'nombre' => $nombre,
            'nivel' => $nivel['id'],
            'nivelLabel' => $nivel['label'],
            'facultad' => $categoria->padre->nombre ?? $categoria->nombre,
            'modalidades' => self::modalidadesBuscador($carrera->modalidades),
            'duracion' => $duracion['label'],
            'duracionKey' => $duracion['key'],
            'url' => route('web.detallecarrera', $carrera->id),
        ];
    }

    /**
     * @return array{id: string, label: string}|null
     */
    private static function careerSearchNivel(Carrera $carrera): ?array
    {
        $categoria = $carrera->categoria;
        $nivelNombre = (string) ($categoria?->nivelAcademico?->nombre ?? '');
        $nombres = array_filter([
            $categoria?->nombre,
            $categoria?->padre?->nombre,
        ]);

        if (in_array('Segunda Especialidad', $nombres, true)) {
            return ['id' => 'segunda', 'label' => 'Segunda especialidad'];
        }

        return match ($nivelNombre) {
            'Pregrado Puede' => ['id' => 'puede', 'label' => 'Puede'],
            'Posgrado' => ['id' => 'posgrado', 'label' => 'Posgrado'],
            'Pregrado' => ['id' => 'pregrado', 'label' => 'Pregrado'],
            default => null,
        };
    }

    /**
     * @return list<string>
     */
    private static function modalidadesBuscador(?string $raw): array
    {
        $keys = [];

        foreach (modalidades_oficiales($raw) as $linea) {
            $valor = str_contains($linea, ':') ? trim(explode(':', $linea, 2)[1]) : $linea;
            $folded = mb_strtolower($valor);

            if (str_contains($folded, 'semi')) {
                $keys[] = 'Semipresencial';
            } elseif (str_contains($folded, 'distancia') || str_contains($folded, 'virtual')) {
                $keys[] = 'A Distancia';
            } elseif (str_contains($folded, 'presencial')) {
                $keys[] = 'Presencial';
            }
        }

        return array_values(array_unique($keys));
    }

    /**
     * @return array{key: string, label: string}
     */
    private static function duracionBuscador(?string $raw): array
    {
        $label = trim(preg_replace('/\s+/u', ' ', (string) $raw) ?? '');

        if ($label === '') {
            return ['key' => '', 'label' => ''];
        }

        $years = null;

        if (preg_match('/(\d+(?:[.,]\d+)?)\s*a(?:ñ|n)os?/iu', $label, $matches)) {
            $years = (float) str_replace(',', '.', $matches[1]);
        } elseif (preg_match('/(\d+)\s*ciclos?/iu', $label, $matches)) {
            $years = ((int) $matches[1]) / 2;
        } elseif (preg_match('/(\d+)\s*meses/iu', $label, $matches)) {
            $years = ((int) $matches[1]) / 12;
        }

        if ($years === null) {
            return ['key' => mb_strtolower($label), 'label' => $label];
        }

        if ($years <= 1) {
            $key = '1 año o menos';
        } elseif ($years <= 2) {
            $key = '2 años';
        } elseif ($years <= 3) {
            $key = '3 años';
        } elseif ($years <= 5) {
            $key = '4 a 5 años';
        } else {
            $key = 'Más de 5 años';
        }

        return ['key' => $key, 'label' => $label];
    }

    /**
     * Compact catalog for the Angela WhatsApp widget (nivel → carreras).
     *
     * @return array{niveles: list<array{id: string, nombre: string, carreras: list<array{id: mixed, nombre: string, modalidades: list<string>, admision: string|null}>}>}
     */
    public static function angelaWidgetCatalog(): array
    {
        return [
            'niveles' => [
                [
                    'id' => 'pregrado',
                    'nombre' => 'Pregrado',
                    'carreras' => self::flattenChatbotCarreras(self::chatbotPregrado()),
                ],
                [
                    'id' => 'pregrado_puede',
                    'nombre' => 'Pregrado Puede',
                    'carreras' => self::flattenChatbotCarreras(self::chatbotPregradoPuede()),
                ],
                [
                    'id' => 'posgrado',
                    'nombre' => 'Posgrado',
                    'carreras' => self::flattenChatbotCarreras(self::chatbotPosgrado(), withHijos: true),
                ],
            ],
        ];
    }

    /**
     * @param  array<int, array<string, mixed>>  $categorias
     * @return list<array{id: mixed, nombre: string, modalidades: list<string>, admision: string|null}>
     */
    private static function flattenChatbotCarreras(array $categorias, bool $withHijos = false): array
    {
        $carreras = [];

        foreach ($categorias as $categoria) {
            $listas = $categoria['carreras'] ?? [];

            if ($withHijos) {
                foreach ($categoria['hijos'] ?? [] as $hijo) {
                    foreach ($hijo['carreras'] ?? [] as $carrera) {
                        $listas[] = $carrera;
                    }
                }
            }

            foreach ($listas as $carrera) {
                $carreras[] = self::mapAngelaWidgetCarrera($carrera);
            }
        }

        return $carreras;
    }

    /**
     * @param  array<string, mixed>  $carrera
     * @return array{id: mixed, nombre: string, modalidades: list<string>, admision: string|null}
     */
    private static function mapAngelaWidgetCarrera(array $carrera): array
    {
        $modalidades = array_values(array_filter(array_map(
            'trim',
            preg_split('/,\s*/', (string) ($carrera['modalidades'] ?? '')) ?: []
        )));

        $admision = null;
        if (! empty($carrera['admision'])) {
            try {
                $admision = \Carbon\Carbon::parse($carrera['admision'])
                    ->locale('es')
                    ->translatedFormat('j \d\e F \d\e Y');
            } catch (\Throwable) {
                $admision = is_string($carrera['admision']) ? $carrera['admision'] : null;
            }
        }

        return [
            'id' => $carrera['id'] ?? null,
            'nombre' => (string) ($carrera['nombre'] ?? ''),
            'modalidades' => $modalidades,
            'admision' => $admision,
        ];
    }

    private static function visibleInNavCarrerasRelation(): \Closure
    {
        return function ($query): void {
            $query->select(['id', 'categoria_id', 'nombre']);

            if (Schema::hasColumn('carreras', 'visible_in_nav')) {
                $query->where('visible_in_nav', true);
            }

            $query->orderBy('nombre');
        };
    }
}
