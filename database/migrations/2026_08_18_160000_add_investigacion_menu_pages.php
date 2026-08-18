<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (! $this->navTablesExist()) {
            return;
        }

        $groupId = DB::table('nav_groups')->where('key', 'innovacion')->value('id');

        if (! $groupId) {
            return;
        }

        $routes = config('breadcrumbs.routes', []);
        $entries = config('breadcrumbs.sections.innovacion.items', []);

        DB::table('nav_links')->where('group_id', $groupId)->delete();

        $orden = 0;
        foreach ($entries as $entry) {
            if (isset($entry['route'])) {
                $routeName = $entry['route'];
                DB::table('nav_links')->insert([
                    'group_id' => $groupId,
                    'label' => $entry['label'] ?? ($routes[$routeName]['menu_label'] ?? $routeName),
                    'route_name' => $routeName,
                    'url' => null,
                    'external' => false,
                    'visible_desktop' => true,
                    'visible_mobile' => true,
                    'orden' => $orden++,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                continue;
            }

            $url = $entry['url'] ?? null;

            if (! isset($entry['label']) || $url === null || $url === '' || $url === '#') {
                continue;
            }

            DB::table('nav_links')->insert([
                'group_id' => $groupId,
                'label' => $entry['label'],
                'route_name' => null,
                'url' => $url,
                'external' => (bool) ($entry['external'] ?? false),
                'visible_desktop' => true,
                'visible_mobile' => true,
                'orden' => $orden++,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        if (! $this->navTablesExist()) {
            return;
        }

        $groupId = DB::table('nav_groups')->where('key', 'innovacion')->value('id');

        if (! $groupId) {
            return;
        }

        DB::table('nav_links')->where('group_id', $groupId)->delete();

        $legacyEntries = [
            ['route' => 'direccion', 'orden' => 0],
            ['route' => 'centro_investigacion', 'orden' => 1],
            [
                'label' => 'Reglamentos de Investigación',
                'url' => 'https://drive.google.com/drive/folders/136MRdt_fKaUNK7kLVfmbnlR863c7Ox8E',
                'external' => true,
                'orden' => 2,
            ],
        ];

        $routes = config('breadcrumbs.routes', []);

        foreach ($legacyEntries as $entry) {
            if (isset($entry['route'])) {
                DB::table('nav_links')->insert([
                    'group_id' => $groupId,
                    'label' => $routes[$entry['route']]['menu_label'] ?? $entry['route'],
                    'route_name' => $entry['route'],
                    'url' => null,
                    'external' => false,
                    'visible_desktop' => true,
                    'visible_mobile' => true,
                    'orden' => $entry['orden'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                continue;
            }

            DB::table('nav_links')->insert([
                'group_id' => $groupId,
                'label' => $entry['label'],
                'route_name' => null,
                'url' => $entry['url'],
                'external' => $entry['external'],
                'visible_desktop' => true,
                'visible_mobile' => true,
                'orden' => $entry['orden'],
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
