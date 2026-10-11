<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $now = now();

        DB::table('categorias_noticias')->updateOrInsert(
            ['nombre' => 'Investigación'],
            ['orden' => 1]
        );

        $categoriaId = DB::table('categorias_noticias')
            ->where('nombre', 'Investigación')
            ->value('id');

        DB::table('noticias')->updateOrInsert(
            ['slug' => 'conecta-con-nuevas-ideas-experiencias-y-conocimientos'],
            [
                'categoria_noticia_id' => $categoriaId,
                'titulo' => '🌎🔬 ¡Conecta con nuevas ideas, experiencias y conocimientos!',
                'fecha' => '2026-10-16',
                'fecha_fin' => '2026-10-17',
                'descripcion_corta' => 'La Universidad Privada de Trujillo – UPRIT, a través del Vicerrectorado de Investigación, invita a toda la comunidad universitaria a participar en el I Congreso Internacional Multidisciplinario de Investigación e Innovación Científica en la Era de la IA.',
                'imagen' => 'noticia_ce975e871500025496730df4acd33642.jpg',
                'tags' => json_encode(['Virtual', 'IA', 'Internacional', 'UPRIT']),
                'autor_nombre' => null,
                'autor_descripcion' => null,
                'autor_imagen' => null,
                'descripcion_total' => '<p>La Universidad Privada de Trujillo – UPRIT, a través del Vicerrectorado de Investigación, invita a toda la comunidad universitaria a participar en el I Congreso Internacional Multidisciplinario de Investigación e Innovación Científica en la Era de la IA.<br>Será una oportunidad para conocer experiencias de especialistas nacionales e internacionales, fortalecer tu formación académica y acercarte a nuevas tendencias en investigación, innovación e inteligencia artificial. 📚✨</p><p>📅 16 y 17 de noviembre de 2026<br>💻 Modalidad virtual<br>🌎 Ponentes de Argentina, Chile, Egipto, México, Perú, El Salvador y Guatemala<br>📝 Inscripciones abiertas</p><p>Puedes registrarte y consultar el programa escaneando los códigos QR del flyer oficial.<br>📩 El enlace de acceso será enviado días antes del Congreso a los participantes registrados.</p><p>✨ Participa, amplía tus conocimientos y sé parte de una experiencia académica internacional.<br>__<br>Vicerrectorado de Investigación – UPRIT</p>',
                'estado' => true,
                'enlace_externo' => null,
                'abrir_nueva_pestana' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );

        DB::table('home_flyers')->updateOrInsert(
            ['imagen' => 'home_flyers/flyer_5f2aa9d17d99fbdfbc0fcc2c3055f92e.jpg'],
            [
                'titulo' => '¡Conecta con nuevas ideas, experiencias y conocimientos!',
                'tipo_enlace' => 'interno',
                'enlace' => null,
                'nueva_pestana' => false,
                'activo' => true,
                'orden' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );

        DB::table('home_flyers')->where('imagen', 'web/imagenes/bienestar/psicopedagogico/flyer-oficial.jpg')->update(['orden' => 2]);
        DB::table('home_flyers')->where('imagen', 'web/imagenes/bienestar/salud/flyer-oficial.jpg')->update(['orden' => 3]);
    }

    public function down(): void
    {
        DB::table('noticias')->where('slug', 'conecta-con-nuevas-ideas-experiencias-y-conocimientos')->delete();
        DB::table('home_flyers')->where('imagen', 'home_flyers/flyer_5f2aa9d17d99fbdfbc0fcc2c3055f92e.jpg')->delete();
    }
};
