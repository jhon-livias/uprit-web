<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $this->updateCarreraNombres();
        $this->updatePosgradoNav();
    }

    public function down(): void
    {
        $this->revertCarreraNombres();
        $this->revertPosgradoNav();
    }

    private function updateCarreraNombres(): void
    {
        if (! DB::getSchemaBuilder()->hasTable('carreras')) {
            return;
        }

        $updates = [
            'Maestría en Ciencias De La Educación Y Gestión Educativa' => 'Maestría en Ciencias de la Educación u Gestión Educativa',
            'Maestría en Investigación Y Docencia Universitaria' => 'Maestría en Investigación y Docencia Universitaria',
            'Maestria en Psicología Educativa Y Psicopedagogía' => 'Maestría en Psicología Educativa y Psicopedagogía',
            'Maestría en Educación en Entornos Virtuales Y Tecnología Educativa' => 'Maestría en Educación en Entornos Virtuales y Tecnología Educativa',
        ];

        foreach ($updates as $from => $to) {
            DB::table('carreras')->where('nombre', $from)->update(['nombre' => $to]);
        }
    }

    private function revertCarreraNombres(): void
    {
        if (! DB::getSchemaBuilder()->hasTable('carreras')) {
            return;
        }

        $updates = [
            'Maestría en Ciencias de la Educación u Gestión Educativa' => 'Maestría en Ciencias De La Educación Y Gestión Educativa',
            'Maestría en Investigación y Docencia Universitaria' => 'Maestría en Investigación Y Docencia Universitaria',
            'Maestría en Psicología Educativa y Psicopedagogía' => 'Maestria en Psicología Educativa Y Psicopedagogía',
            'Maestría en Educación en Entornos Virtuales y Tecnología Educativa' => 'Maestría en Educación en Entornos Virtuales Y Tecnología Educativa',
        ];

        foreach ($updates as $from => $to) {
            DB::table('carreras')->where('nombre', $from)->update(['nombre' => $to]);
        }
    }

    private function updatePosgradoNav(): void
    {
        if (! $this->navTablesExist()) {
            return;
        }

        $group = DB::table('nav_groups')->where('key', 'posgrado')->first();

        if (! $group) {
            return;
        }

        $meta = json_decode($group->meta ?? '{}', true) ?: [];
        $meta['informes_label'] = 'Presentación';

        DB::table('nav_groups')->where('id', $group->id)->update([
            'meta' => json_encode($meta),
            'updated_at' => now(),
        ]);

        DB::table('nav_links')->where('group_id', $group->id)->delete();

        $routes = config('breadcrumbs.routes', []);
        $entries = config('breadcrumbs.sections.posgrado.routes', []);

        $orden = 0;
        foreach ($entries as $routeName) {
            DB::table('nav_links')->insert([
                'group_id' => $group->id,
                'label' => $routes[$routeName]['menu_label'] ?? $routeName,
                'route_name' => $routeName,
                'url' => null,
                'external' => false,
                'visible_desktop' => true,
                'visible_mobile' => true,
                'orden' => $orden++,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function revertPosgradoNav(): void
    {
        if (! $this->navTablesExist()) {
            return;
        }

        $group = DB::table('nav_groups')->where('key', 'posgrado')->first();

        if (! $group) {
            return;
        }

        $meta = json_decode($group->meta ?? '{}', true) ?: [];
        unset($meta['informes_label']);

        DB::table('nav_groups')->where('id', $group->id)->update([
            'meta' => json_encode($meta),
            'updated_at' => now(),
        ]);

        DB::table('nav_links')->where('group_id', $group->id)->delete();

        $routes = config('breadcrumbs.routes', []);
        $legacyRoutes = ['escuela-posgrado', 'posgrado-doble', 'mision-academica', 'vive'];
        $orden = 0;

        foreach ($legacyRoutes as $routeName) {
            DB::table('nav_links')->insert([
                'group_id' => $group->id,
                'label' => $routes[$routeName]['menu_label'] ?? $routeName,
                'route_name' => $routeName,
                'url' => null,
                'external' => false,
                'visible_desktop' => true,
                'visible_mobile' => true,
                'orden' => $orden++,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function navTablesExist(): bool
    {
        $schema = DB::getSchemaBuilder();

        return $schema->hasTable('nav_groups') && $schema->hasTable('nav_links');
    }
};
