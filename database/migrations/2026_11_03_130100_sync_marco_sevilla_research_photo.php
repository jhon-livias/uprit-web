<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Keep the production profile in sync with the photo selected in the
     * docentes administration panel before this deployment.
     */
    public function up(): void
    {
        DB::table('docentes')
            ->where('nombre', 'Marco Antonio Sevilla Gamarra')
            ->update([
                'imagen' => 'carreras_docentes/docente_14f7728fa5be9b97fb7082f59aaddc8e.png',
                'updated_at' => now(),
            ]);
    }

    public function down(): void
    {
        // The prior upload was replaced through the administration panel.
    }
};
