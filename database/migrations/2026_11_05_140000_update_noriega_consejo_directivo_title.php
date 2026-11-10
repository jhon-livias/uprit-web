<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('autoridades')
            ->where('nombre', 'like', '%Juan Mauricio Noriega%')
            ->update([
                'cargo' => 'Presidente de la Asamblea General de Asociados y del Consejo Directivo de la UPRIT, MBA, Catedrático.',
            ]);
    }

    public function down(): void
    {
        DB::table('autoridades')
            ->where('nombre', 'like', '%Juan Mauricio Noriega%')
            ->update([
                'cargo' => 'Presidente del Consejo Directivo UPRIT, MBA, Catedrático.',
            ]);
    }
};
