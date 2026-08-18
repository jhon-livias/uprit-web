<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (! $this->navGroupsTableExists()) {
            return;
        }

        DB::table('nav_groups')
            ->where('key', 'innovacion')
            ->update(['label' => 'Investigación']);
    }

    public function down(): void
    {
        if (! $this->navGroupsTableExists()) {
            return;
        }

        DB::table('nav_groups')
            ->where('key', 'innovacion')
            ->update(['label' => 'Innovación']);
    }

    private function navGroupsTableExists(): bool
    {
        return DB::getSchemaBuilder()->hasTable('nav_groups');
    }
};
