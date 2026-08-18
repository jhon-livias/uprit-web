<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (! $this->navLinksTableExists()) {
            return;
        }

        DB::table('nav_links')
            ->where('route_name', 'centro_investigacion')
            ->update([
                'label' => 'Centros de Investigación',
                'updated_at' => now(),
            ]);
    }

    public function down(): void
    {
        if (! $this->navLinksTableExists()) {
            return;
        }

        DB::table('nav_links')
            ->where('route_name', 'centro_investigacion')
            ->update([
                'label' => 'Centro de Investigación',
                'updated_at' => now(),
            ]);
    }

    private function navLinksTableExists(): bool
    {
        return DB::getSchemaBuilder()->hasTable('nav_links');
    }
};
