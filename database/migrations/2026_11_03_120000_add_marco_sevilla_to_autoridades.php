<?php

use App\Models\Autoridad;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Add the new academic authority without duplicating the
     * record when this migration is run in another environment.
     */
    public function up(): void
    {
        Autoridad::updateOrCreate(
            ['nombre' => 'Dr. Marco Antonio Sevilla Gamarra'],
            [
                'cargo' => 'Director de Investigación',
                'tipo' => 'Alta Dirección',
                'foto' => 'investigacion/marco-sevilla-medalla.png',
                'orden' => 3,
                'estado' => true,
            ]
        );
    }

    /**
     * Preserve content added by this data migration on rollback.
     */
    public function down(): void
    {
        // Intentionally left blank.
    }
};
