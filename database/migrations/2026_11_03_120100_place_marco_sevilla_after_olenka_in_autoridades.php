<?php

use App\Models\Autoridad;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Correct installations where Marco Sevilla was initially classified in
     * Consejo Directivo. Order 3 places him immediately after Olenka.
     */
    public function up(): void
    {
        Autoridad::where('nombre', 'Dr. Marco Antonio Sevilla Gamarra')->update([
            'cargo' => 'Vicerrector de Investigación',
            'tipo' => 'Alta Dirección',
            'foto' => 'investigacion/marco-sevilla-medalla.png',
            'orden' => 3,
            'estado' => true,
        ]);
    }

    public function down(): void
    {
        // Content records are intentionally preserved on rollback.
    }
};
