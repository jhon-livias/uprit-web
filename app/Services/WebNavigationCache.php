<?php

namespace App\Services;

use App\Models\Categoria;
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

    public static function chatbotPregrado(): Collection
    {
        return self::rememberCollection(
            self::KEY_CHATBOT_PREGRADO,
            fn () => self::queryChatbotByNivel('Pregrado', withHijos: false)
        );
    }

    public static function chatbotPregradoPuede(): Collection
    {
        return self::rememberCollection(
            self::KEY_CHATBOT_PREGRADO_PUEDE,
            fn () => self::queryChatbotByNivel('Pregrado Puede', withHijos: false)
        );
    }

    public static function chatbotPosgrado(): Collection
    {
        return self::rememberCollection(
            self::KEY_CHATBOT_POSGRADO,
            fn () => self::queryChatbotByNivel('Posgrado', withHijos: true)
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
            ])
            ->orderBy('nombre')
            ->get();
    }

    private static function queryChatbotByNivel(string $nivelNombre, bool $withHijos): Collection
    {
        if ($withHijos) {
            return Categoria::with([
                'hijos.carreras.detalle_descripcion',
                'hijos.carreras.perfilEgresado',
                'hijos.carreras.docentes',
                'hijos.carreras.malla',
                'hijos.carreras.preguntas',
            ])
                ->whereHas('nivelAcademico', fn ($q) => $q->where('nombre', $nivelNombre))
                ->whereNull('padre_id')
                ->orderBy('nombre')
                ->get();
        }

        return Categoria::with([
            'carreras.detalle_descripcion',
            'carreras.perfilEgresado',
            'carreras.docentes',
            'carreras.malla',
            'carreras.preguntas',
        ])
            ->whereHas('nivelAcademico', fn ($q) => $q->where('nombre', $nivelNombre))
            ->whereNull('padre_id')
            ->orderBy('nombre')
            ->get();
    }
}
