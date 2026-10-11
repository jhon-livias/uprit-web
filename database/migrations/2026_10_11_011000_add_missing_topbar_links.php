<?php

use App\Models\NavGroup;
use App\Models\NavLink;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('nav_groups') || !Schema::hasTable('nav_links')) {
            return;
        }

        $items = [
            ['key' => 'noticias', 'label' => 'Noticias', 'route_name' => 'web.noticias', 'external' => false, 'orden' => 1],
            ['key' => 'idiomas', 'label' => 'Idiomas', 'url' => 'https://idiomas.uprit.edu.pe', 'external' => true, 'orden' => 2],
        ];

        foreach ($items as $item) {
            $group = NavGroup::firstOrCreate(
                ['key' => $item['key']],
                [
                    'label' => $item['label'],
                    'tipo' => 'topbar',
                    'show_in_main_nav' => false,
                    'show_in_topbar' => true,
                    'visible' => true,
                    'visible_desktop' => true,
                    'visible_mobile' => true,
                    'orden' => $item['orden'],
                ]
            );

            NavLink::firstOrCreate(
                ['group_id' => $group->id, 'label' => $item['label']],
                [
                    'route_name' => $item['route_name'] ?? null,
                    'url' => $item['url'] ?? null,
                    'external' => $item['external'],
                    'visible' => true,
                    'visible_desktop' => true,
                    'visible_mobile' => true,
                    'orden' => 1,
                ]
            );
        }

        NavGroup::where('key', 'transparencia')->update(['orden' => 3]);
        NavGroup::where('key', 'plataforma')->update(['orden' => 4]);
    }

    public function down(): void
    {
        // Se preservan enlaces configurados por el usuario.
    }
};
