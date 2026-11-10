<?php

use App\Services\WebNavigationCache;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('nav_groups') || ! Schema::hasTable('nav_links')) {
            return;
        }

        $groupId = DB::table('nav_groups')->where('key', 'conocenos')->value('id');

        if (! $groupId) {
            return;
        }

        if (DB::table('nav_links')->where('group_id', $groupId)->where('route_name', 'galeria-autoridades')->exists()) {
            return;
        }

        $autoridadesOrden = DB::table('nav_links')
            ->where('group_id', $groupId)
            ->where('route_name', 'autoridades')
            ->value('orden');

        $orden = is_numeric($autoridadesOrden) ? ((int) $autoridadesOrden) + 1 : 3;

        DB::table('nav_links')
            ->where('group_id', $groupId)
            ->where('orden', '>=', $orden)
            ->increment('orden');

        DB::table('nav_links')->insert([
            'group_id' => $groupId,
            'label' => 'Galería Autoridades',
            'route_name' => 'galeria-autoridades',
            'url' => null,
            'external' => false,
            'visible' => true,
            'visible_desktop' => true,
            'visible_mobile' => true,
            'orden' => $orden,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        WebNavigationCache::forget();
    }

    public function down(): void
    {
        if (! Schema::hasTable('nav_groups') || ! Schema::hasTable('nav_links')) {
            return;
        }

        $groupId = DB::table('nav_groups')->where('key', 'conocenos')->value('id');

        if (! $groupId) {
            return;
        }

        $link = DB::table('nav_links')
            ->where('group_id', $groupId)
            ->where('route_name', 'galeria-autoridades')
            ->first();

        if (! $link) {
            return;
        }

        DB::table('nav_links')->where('id', $link->id)->delete();

        DB::table('nav_links')
            ->where('group_id', $groupId)
            ->where('orden', '>', $link->orden)
            ->decrement('orden');

        WebNavigationCache::forget();
    }
};
