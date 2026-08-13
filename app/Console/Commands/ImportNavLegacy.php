<?php

namespace App\Console\Commands;

use App\Models\NavGroup;
use App\Models\NavLink;
use App\Services\WebNavigationCache;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportNavLegacy extends Command
{
    protected $signature = 'nav:import-legacy {--force : Reemplaza datos existentes del menú}';

    protected $description = 'Importa grupos y enlaces del menú web desde config/breadcrumbs.php y valores legacy';

    public function handle(): int
    {
        if (NavGroup::exists() && !$this->option('force')) {
            $this->warn('Ya hay datos de menú. Usa --force para reimportar.');

            return self::SUCCESS;
        }

        DB::transaction(function () {
            if ($this->option('force')) {
                NavLink::query()->delete();
                NavGroup::query()->delete();
            }

            $this->seedGroups();
            $this->seedSectionLinks();
            $this->seedPlatformLinks();
            $this->seedMobileOnlyLinks();
        });

        WebNavigationCache::forget();
        $this->info('Menú importado correctamente.');

        return self::SUCCESS;
    }

    private function seedGroups(): void
    {
        $groups = [
            ['key' => 'pregrado', 'label' => 'Pregrado', 'tipo' => 'academic', 'academic_nivel' => 'Pregrado', 'informes_key' => null, 'css_class' => 'mega-pregrado', 'show_in_main_nav' => true, 'orden' => 10, 'meta' => [
                'tab_regular_label' => 'Pregrado Regular',
                'tab_puede_label' => 'Pregrado Puede',
                'tab_puede_hint' => 'Para personas que trabajan',
            ]],
            ['key' => 'pregrado_puede', 'label' => 'Pregrado Puede', 'tipo' => 'academic', 'academic_nivel' => 'Pregrado Puede', 'informes_key' => null, 'css_class' => 'pre-puede', 'show_in_main_nav' => false, 'visible' => true, 'orden' => 20],
            ['key' => 'posgrado', 'label' => 'Posgrado', 'tipo' => 'academic', 'academic_nivel' => 'Posgrado', 'informes_key' => 'posgrado', 'css_class' => 'mega-posgrado', 'show_in_main_nav' => true, 'orden' => 30],
            ['key' => 'innovacion', 'label' => 'Innovación', 'tipo' => 'section', 'css_class' => 'servicios', 'show_in_main_nav' => true, 'orden' => 40, 'meta' => ['routes_only' => false]],
            ['key' => 'servicios', 'label' => 'Servicios', 'tipo' => 'section', 'css_class' => 'mega-servicios', 'show_in_main_nav' => true, 'orden' => 50, 'meta' => [
                'tab_labels' => [
                    'bienestar' => 'Bienestar universitario y RSU',
                    'otros' => 'Otros servicios',
                ],
            ]],
            ['key' => 'conocenos', 'label' => 'Conócenos', 'tipo' => 'section', 'css_class' => 'conocenos', 'show_in_main_nav' => true, 'orden' => 60],
            ['key' => 'contactanos', 'label' => 'Contáctanos', 'tipo' => 'section', 'css_class' => 'servicios', 'show_in_main_nav' => true, 'orden' => 70],
            ['key' => 'postula', 'label' => 'Postula Aquí', 'tipo' => 'button', 'show_in_main_nav' => true, 'orden' => 80],
            ['key' => 'idiomas', 'label' => 'Idiomas', 'tipo' => 'topbar', 'show_in_main_nav' => false, 'show_in_topbar' => true, 'orden' => 5, 'meta' => ['url' => 'https://idiomas.uprit.edu.pe', 'external' => true]],
            ['key' => 'noticias', 'label' => 'Noticias', 'tipo' => 'topbar', 'show_in_topbar' => true, 'orden' => 10, 'meta' => ['route_name' => 'web.noticias']],
            ['key' => 'transparencia', 'label' => 'Transparencia', 'tipo' => 'topbar', 'show_in_topbar' => true, 'orden' => 20, 'meta' => ['route_name' => 'transparencia']],
            ['key' => 'plataforma', 'label' => 'Nuestra Plataforma', 'tipo' => 'platform', 'show_in_topbar' => true, 'orden' => 30],
        ];

        foreach ($groups as $group) {
            NavGroup::create($group);
        }
    }

    private function seedSectionLinks(): void
    {
        $sections = config('breadcrumbs.sections', []);
        $routes = config('breadcrumbs.routes', []);

        foreach ($sections as $key => $section) {
            $group = NavGroup::where('key', $key)->first();

            if (!$group) {
                continue;
            }

            $entries = $section['items'] ?? array_map(
                static fn (string $routeKey) => ['route' => $routeKey],
                $section['routes'] ?? []
            );

            $orden = 0;
            foreach ($entries as $entry) {
                if (isset($entry['route'])) {
                    NavLink::create([
                        'group_id' => $group->id,
                        'label' => $entry['label'] ?? ($routes[$entry['route']]['menu_label'] ?? $entry['route']),
                        'route_name' => $entry['route'],
                        'external' => false,
                        'orden' => $orden++,
                    ]);

                    continue;
                }

                if (!isset($entry['label'])) {
                    continue;
                }

                $url = $entry['url'] ?? null;

                if ($url === '#' || $url === '') {
                    continue;
                }

                NavLink::create([
                    'group_id' => $group->id,
                    'label' => $entry['label'],
                    'url' => $url,
                    'external' => (bool) ($entry['external'] ?? false),
                    'orden' => $orden++,
                ]);
            }
        }
    }

    private function seedPlatformLinks(): void
    {
        $group = NavGroup::where('key', 'plataforma')->first();

        if (!$group) {
            return;
        }

        $links = [
            ['label' => 'ERP', 'url' => 'https://intranet.uprit.edu.pe/', 'external' => true],
            ['label' => 'Biblioteca Virtual', 'url' => 'https://www.digitaliapublishing.com/', 'external' => true],
            ['label' => 'Repositorio - ALICIA', 'url' => 'https://repositorio.uprit.edu.pe/', 'external' => true],
            ['label' => 'Aula Virtual', 'url' => 'https://moodle.uprit.edu.pe', 'external' => true],
        ];

        foreach ($links as $index => $link) {
            NavLink::create([
                'group_id' => $group->id,
                'label' => $link['label'],
                'url' => $link['url'],
                'external' => $link['external'],
                'orden' => $index,
            ]);
        }
    }

    private function seedMobileOnlyLinks(): void
    {
        $conocenos = NavGroup::where('key', 'conocenos')->first();
        $pregradoPuede = NavGroup::where('key', 'pregrado_puede')->first();

        if ($conocenos) {
            NavLink::create([
                'group_id' => $conocenos->id,
                'label' => 'Convenios y Afiliaciones',
                'url' => '#',
                'visible_desktop' => false,
                'orden' => 100,
            ]);
            NavLink::create([
                'group_id' => $conocenos->id,
                'label' => 'Acceso a la Información Pública',
                'url' => '#',
                'visible_desktop' => false,
                'orden' => 110,
            ]);
        }

        if ($pregradoPuede) {
            NavLink::create([
                'group_id' => $pregradoPuede->id,
                'label' => 'Segunda Carrera profesional',
                'url' => '#',
                'visible_desktop' => false,
                'visible_mobile' => false,
                'orden' => 100,
            ]);
        }
    }
}
