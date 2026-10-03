<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Autoridad;
use App\Models\Docente;

class AutoridadSeeder extends Seeder
{
    public function run()
    {
        // 1. Consejo Directivo
        $directivo = [
            [
                'nombre' => 'Juan Mauricio Noriega Escobedo',
                'cargo'  => 'Presidente del Consejo Directivo UPRIT, MBA, Catedrático.',
                'tipo'   => 'Consejo Directivo',
                'foto'   => 'web/imagenes/autoridades/juan-mauricio-noriega.jpg',
                'orden'  => 1
            ],
            [
                'nombre' => 'Rómulo Mucho Mamani',
                'cargo'  => 'Director, Ingeniero, ex Ministro de Energía y Minas, Catedrático.',
                'tipo'   => 'Consejo Directivo',
                'foto'   => 'web/imagenes/autoridades/romulo-mucho.jpg',
                'orden'  => 2
            ],
            [
                'nombre' => 'Militza Jovick Muñoz',
                'cargo'  => 'Director, Médico Cirujano, ex Presidente de la FILACP.',
                'tipo'   => 'Consejo Directivo',
                'foto'   => 'web/imagenes/autoridades/militza-jovick.jpg',
                'orden'  => 3
            ],
            [
                'nombre' => 'Diego Emilio Leyton Martínez',
                'cargo'  => 'Director, MBA, Director Sostenibilidad Cia.M.B, Catedrático.',
                'tipo'   => 'Consejo Directivo',
                'foto'   => 'web/imagenes/autoridades/diego-leyton.jpg',
                'orden'  => 4
            ],
            [
                'nombre' => 'Juan Carlos Noriega Escobedo',
                'cargo'  => 'Director, MBA, Gerente Regional Bioreg Pharma, Catedrático.',
                'tipo'   => 'Consejo Directivo',
                'foto'   => 'web/imagenes/autoridades/juan-carlos-noriega.jpg',
                'orden'  => 5
            ],
        ];

        foreach ($directivo as $data) {
            Autoridad::updateOrCreate(
                ['nombre' => $data['nombre']], 
                $data
            );
        }

        // 2. Alta Dirección
        $alta_direccion = [
            ['buscar' => 'José Miguel Sibina', 'nombre' => 'José Miguel Sibina Pereyra', 'cargo' => 'Rector', 'tipo' => 'Alta Dirección', 'orden' => 1],
            ['buscar' => 'Olenka Ana Catherine', 'nombre' => 'Olenka Ana Catherine Espinoza Rodriguez', 'cargo' => 'Vicerrectora Académica', 'tipo' => 'Alta Dirección', 'orden' => 2],
        ];

        foreach ($alta_direccion as $item) {
            $docente = $this->docenteAutoridad($item['buscar']);
            Autoridad::updateOrCreate(
                ['nombre' => $docente ? $docente->nombre_con_titulo : $item['nombre']],
                [
                    'cargo'  => $item['cargo'],
                    'tipo'   => $item['tipo'],
                    'foto'   => $docente ? $docente->imagen : null,
                    'orden'  => $item['orden']
                ]
            );
        }

        // 3. Gobierno Interno
        $gobierno_interno = [
            ['buscar' => 'Alexander Máximo Rodríguez', 'nombre' => 'Alexander Máximo Rodríguez García', 'cargo' => 'Decano de la Facultad de Derecho y Ciencias Sociales', 'tipo' => 'Gobierno Interno', 'orden' => 1],
            ['buscar' => 'Santos Pedro Aponte', 'nombre' => 'Santos Pedro Aponte Mendez', 'cargo' => 'Decano de la Facultad de Ciencias Empresariales', 'tipo' => 'Gobierno Interno', 'orden' => 2],
            ['buscar' => 'Luis Alberto Acosta', 'nombre' => 'Luis Alberto Acosta Sánchez', 'cargo' => 'Decano de la Facultad de Ingeniería y Arquitectura', 'tipo' => 'Gobierno Interno', 'orden' => 3],
        ];

        foreach ($gobierno_interno as $item) {
            $docente = $this->docenteAutoridad($item['buscar']);
            Autoridad::updateOrCreate(
                ['nombre' => $docente ? $docente->nombre_con_titulo : $item['nombre']],
                [
                    'cargo'  => $item['cargo'],
                    'tipo'   => $item['tipo'],
                    'foto'   => $docente ? $docente->imagen : null,
                    'orden'  => $item['orden']
                ]
            );
        }
    }

    private function docenteAutoridad(string $nombre): ?Docente
    {
        return Docente::query()
            ->where('nombre', 'like', '%' . $nombre . '%')
            ->orderByRaw("CASE WHEN imagen IS NULL OR imagen = '' THEN 1 ELSE 0 END")
            ->first();
    }
}
