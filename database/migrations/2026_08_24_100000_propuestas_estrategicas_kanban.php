<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /** Rango reservado para el backlog de propuestas estratégicas (no colisiona con import_id 1–116). */
    private const IMPORT_IDS = [9001, 9002, 9003, 9004, 9005, 9006, 9007, 9008, 9009, 9010, 9011, 9012, 9013, 9014, 9015, 9016];

    public function up(): void
    {
        if (! Schema::hasTable('observaciones')) {
            return;
        }

        $existentes = DB::table('observaciones')
            ->whereIn('import_id', self::IMPORT_IDS)
            ->count();

        if ($existentes > 0) {
            return;
        }

        $ordenBase = (int) (DB::table('observaciones')->max('orden') ?? 0);

        $items = [
            [
                'import_id' => 9001,
                'area' => 'Propuestas estratégicas',
                'pagina' => 'Página principal / Home',
                'titulo' => '[Captación] Formulario breve de contacto en Home',
                'descripcion' => "Objetivo: captar leads con acción «Solicitar información».\n\nEstado actual: index.blade.php no tiene formulario; solo noticias, testimonios y FAQ.\n\nImplementar en:\n- resources/views/web/index.blade.php (sección visible above-the-fold o tras hero)\n- Nuevo endpoint POST Laravel (ContactController + Mail/Notification)\n- Reutilizar estilos de contactenos.blade.php / uprit-custom.css (.rnt-contact-form)\n\nCriterio de aceptación: formulario funcional con nombre, correo, programa de interés y modalidad; envío sin depender de mail.php legacy.",
                'prioridad' => 'alta',
            ],
            [
                'import_id' => 9002,
                'area' => 'Propuestas estratégicas',
                'pagina' => 'Carrera / Programa académico',
                'titulo' => '[Captación] Formulario de contacto en detalle de carrera',
                'descripcion' => "Objetivo: captar leads contextualizados por carrera.\n\nEstado actual: detalle-carrera.blade.php tiene col-lg-5 vacío en el hero (clase swiper-formulario sugiere formulario previo).\n\nImplementar en:\n- resources/views/web/detalle-carrera.blade.php (columna derecha del hero)\n- Mismo backend de contacto que Home, con carrera preseleccionada (hidden field desde \$carrera->id / nombre)\n- WebController::detallecarrera() si se necesita data extra\n\nCriterio de aceptación: al enviar desde /detalle-carrera/{id}, el lead incluye la carrera visitada.",
                'prioridad' => 'alta',
            ],
            [
                'import_id' => 9003,
                'area' => 'Propuestas estratégicas',
                'pagina' => 'Contáctenos',
                'titulo' => '[Captación] Rehabilitar /contactenos con backend Laravel',
                'descripcion' => "Objetivo: reactivar la página de contacto institucional.\n\nEstado actual: contactenos.blade.php muestra alerta «Formulario temporalmente deshabilitado»; action apunta a mail.php; routes/web.php solo tiene GET /contactenos sin POST.\n\nImplementar en:\n- resources/views/web/contactenos.blade.php\n- routes/web.php + ContactController\n- public/web/assets/js/app.js (reemplazar AJAX a mail.php)\n\nCriterio de aceptación: formulario activo, validación server-side y notificación a informes@uprit.edu.pe (o CRM).",
                'prioridad' => 'alta',
            ],
            [
                'import_id' => 9004,
                'area' => 'Propuestas estratégicas',
                'pagina' => 'Carrera / Programa académico',
                'titulo' => '[Oferta académica] Sección Certificaciones progresivas',
                'descripcion' => "Objetivo: explicar certificaciones y en qué momento del plan se obtienen.\n\nEstado actual: no existe modelo ni sección por carrera. Solo menciones genéricas en index FAQ, escuela-posgrado y a2iprograma.\n\nImplementar en:\n- Nueva sección/tab en detalle-carrera.blade.php\n- Campos en admin: CarreraComponent.vue (nuevo tab o bloque en Descripción)\n- Posible tabla carrera_certificaciones o JSON en carrera_descripcion\n- Modelo/migración si se requiere persistencia estructurada\n\nCriterio de aceptación: cada carrera puede listar certificaciones con nombre y ciclo/momento de obtención.",
                'prioridad' => 'media',
            ],
            [
                'import_id' => 9005,
                'area' => 'Propuestas estratégicas',
                'pagina' => 'Carrera / Programa académico',
                'titulo' => '[Oferta académica] Auditar duración por carrera',
                'descripcion' => "Objetivo: mostrar claramente la duración de cada programa.\n\nEstado actual: IMPLEMENTADO en sidebar de detalle-carrera.blade.php (\$carrera->duracion). Admin en CarreraComponent.vue tab Información general.\n\nAcción: revisión de contenido en BD (carreras.duracion), no requiere nueva arquitectura.\n\nArchivos de referencia:\n- resources/views/web/detalle-carrera.blade.php\n- resources/js/components/admin/CarreraComponent.vue\n\nCriterio de aceptación: todas las carreras publicadas tienen duración correcta y actualizada.",
                'prioridad' => 'baja',
            ],
            [
                'import_id' => 9006,
                'area' => 'Propuestas estratégicas',
                'pagina' => 'Carrera / Programa académico',
                'titulo' => '[Oferta académica] Unificar y completar modalidades',
                'descripcion' => "Objetivo: mostrar Presencial, Semipresencial y A Distancia de forma clara.\n\nEstado actual: IMPLEMENTADO vía modalidades_oficiales() en app/helpers.php y sidebar de detalle-carrera. Admin: campo texto multilínea en carreras.modalidades.\n\nDeuda conocida (observaciones-import.json): Virtual vs A Distancia; no todas las modalidades visibles; caso Derecho vs otras carreras.\n\nArchivos:\n- app/helpers.php (modalidades_oficiales)\n- detalle-carrera.blade.php\n- Migraciones ana_maria / marietta ya normalizan parte del contenido\n\nCriterio de aceptación: nomenclatura oficial uniforme y todas las modalidades registradas visibles por carrera.",
                'prioridad' => 'media',
            ],
            [
                'import_id' => 9007,
                'area' => 'Propuestas estratégicas',
                'pagina' => 'Carrera / Programa académico',
                'titulo' => '[Oferta académica] Sección Perfil de ingreso',
                'descripcion' => "Objetivo: explicar a quién va dirigida la carrera según diseño curricular.\n\nEstado actual: NO EXISTE sección dedicada. El hero usa \$carrera->descripcion (texto general, no perfil de ingreso).\n\nImplementar en:\n- detalle-carrera.blade.php (nuevo bloque o tab)\n- Admin CarreraComponent.vue (nuevo tab, similar a Perfil de egresado)\n- Posible modelo carrera_perfil_ingreso o campo en carrera_descripcion\n\nCriterio de aceptación: sección «Perfil de ingreso» editable en admin y visible en web por carrera.",
                'prioridad' => 'media',
            ],
            [
                'import_id' => 9008,
                'area' => 'Propuestas estratégicas',
                'pagina' => 'Carrera / Programa académico',
                'titulo' => '[Oferta académica] Ampliar Campo laboral (oportunidades)',
                'descripcion' => "Objetivo: presentar cargos, sectores y áreas de desempeño.\n\nEstado actual: PARCIAL como «Oportunidades en el mercado» en tab Descripción (carrera_descripcion.oportunidades, array de strings). Admin en CarreraComponent.vue tab Descripción.\n\nImplementar/mejorar en:\n- detalle-carrera.blade.php (bloque oportunidades)\n- CarreraComponent.vue (estructura: cargo, sector, área — o texto enriquecido)\n- app/Models/CarreraDescripcion.php\n\nCriterio de aceptación: campo laboral más descriptivo que lista simple; alineado al diseño curricular vigente.",
                'prioridad' => 'media',
            ],
            [
                'import_id' => 9009,
                'area' => 'Propuestas estratégicas',
                'pagina' => 'Carrera / Programa académico',
                'titulo' => '[Descripción] Testimonios por carrera (preferible video)',
                'descripcion' => "Objetivo: testimonios de estudiantes/egresados en detalle de carrera para generar credibilidad.\n\nEstado actual: testimonios solo en Home (index.blade.php). Modelo Testimonio sin carrera_id ni video. Admin: TestimonioComponent.vue global.\n\nImplementar en:\n- app/Models/Testimonio.php (+ carrera_id, url_video)\n- Migración pivot o FK\n- detalle-carrera.blade.php (sección testimonios)\n- TestimonioComponent.vue (filtro por carrera, campo video)\n\nCriterio de aceptación: cada carrera puede mostrar 1+ testimonios propios; soporte video embebido o URL.",
                'prioridad' => 'media',
            ],
            [
                'import_id' => 9010,
                'area' => 'Propuestas estratégicas',
                'pagina' => 'Carrera / Programa académico',
                'titulo' => '[Docentes] Actualizar roster y destacar perfiles por carrera',
                'descripcion' => "Objetivo: docentes vigentes con foto y bio correctas por programa.\n\nEstado actual: tab «Nuestros Docentes» en detalle-carrera.blade.php. Pivot carrera_docente. Admin dual: DocenteComponent.vue + CarreraComponent.vue tab Docentes.\n\nDeuda: observaciones reportan fotos cruzadas y docentes que ya no laboran.\n\nArchivos:\n- resources/js/components/admin/DocenteComponent.vue\n- resources/js/components/admin/CarreraComponent.vue\n- database/migrations/2026_07_21_120000_create_docentes_and_pivot_tables.php\n\nCriterio de aceptación: cada carrera muestra solo docentes activos con imagen y datos verificados.",
                'prioridad' => 'alta',
            ],
            [
                'import_id' => 9011,
                'area' => 'Propuestas estratégicas',
                'pagina' => 'Carrera / Programa académico',
                'titulo' => '[Docentes] Retirar Antonio Manfredi de carreras de Educación',
                'descripcion' => "Objetivo: eliminar docente que ya no labora en UPRIT de programas de Educación.\n\nEstado actual: en BD legacy aparece como «Antonio Manfredi Fernández Figueroa» (antonio.fernandez@uprit.edu.pe) en múltiples carreras de Educación. No hay «Antonio Fernández» literal en código.\n\nAcción:\n- Admin Docentes: desasignar carreras de Educación en pivot carrera_docente\n- Verificar que no quede en docentes activos\n- Referencia: data/export/observaciones-import.json (obs. Marietta)\n\nCriterio de aceptación: ninguna carrera de Educación publicada lista a Antonio Manfredi Fernández Figueroa.",
                'prioridad' => 'alta',
            ],
            [
                'import_id' => 9012,
                'area' => 'Propuestas estratégicas',
                'pagina' => 'Carrera / Programa académico',
                'titulo' => '[Docentes] Bloque Coordinador de carrera',
                'descripcion' => "Objetivo: presentar coordinador, perfil y mensaje institucional destacado.\n\nEstado actual: NO EXISTE bloque coordinador. Algunos docentes tienen tag «Director»/«Coordinador» en JSON tags sin UI dedicada. Caso referencia: Enrique Boy (Ingeniería) en observaciones.\n\nImplementar en:\n- Campo coordinador_id en carreras o rol en pivot carrera_docente\n- detalle-carrera.blade.php (card destacada antes del listado de docentes)\n- CarreraComponent.vue (selector de coordinador + mensaje opcional)\n\nCriterio de aceptación: cada carrera puede mostrar un coordinador con foto, cargo y mensaje breve.",
                'prioridad' => 'media',
            ],
            [
                'import_id' => 9013,
                'area' => 'Propuestas estratégicas',
                'pagina' => 'Carrera / Programa académico',
                'titulo' => '[Diseño curricular] Malla concordante con plan vigente',
                'descripcion' => "Objetivo: malla curricular alineada al plan que cursan los estudiantes.\n\nEstado actual: tab «Malla Curricular» en detalle-carrera.blade.php (acordeón HTML por ciclos). Admin: CarreraComponent.vue tab Malla curricular → carrera_malla_curricular.\n\nAcción principal: actualización de contenido editorial vía admin (no hay validación automática contra JEdu).\n\nArchivos:\n- detalle-carrera.blade.php\n- CarreraComponent.vue\n- app/Models/CarreraMalla.php\n\nCriterio de aceptación: cursos y ciclos coinciden con el plan académico oficial por carrera.",
                'prioridad' => 'media',
            ],
            [
                'import_id' => 9014,
                'area' => 'Propuestas estratégicas',
                'pagina' => 'Carrera / Programa académico',
                'titulo' => '[Diseño curricular] Descarga PDF de malla curricular',
                'descripcion' => "Objetivo: permitir descargar la malla (acción de usuario en propuesta estratégica).\n\nEstado actual: sidebar ofrece descarga de BROCHURE (brochureUrl() → public/brochures_carreras/). La malla solo se ve en acordeón HTML, sin archivo descargable.\n\nImplementar en:\n- Campo malla_pdf en carreras o storage dedicado\n- detalle-carrera.blade.php (botón «Descargar malla» junto a Brochure)\n- CarreraComponent.vue (upload PDF malla)\n- Carrera model (mallaPdfUrl() similar a brochureUrl())\n\nCriterio de aceptación: botón de descarga de malla PDF por carrera, además de la vista en línea.",
                'prioridad' => 'media',
            ],
            [
                'import_id' => 9015,
                'area' => 'Propuestas estratégicas',
                'pagina' => 'Carrera / Programa académico',
                'titulo' => '[Competencias] Perfil de egreso con competencias estructuradas',
                'descripcion' => "Objetivo: comunicar competencias y capacidades específicas del plan (propuesta de valor profesional).\n\nEstado actual: tab «Perfil de Egresado» con texto libre (carrera_perfil_egresado.descripcion). Admin: CarreraComponent.vue tab Perfil de egresado.\n\nMejorar en:\n- detalle-carrera.blade.php (lista de competencias además de párrafo)\n- CarreraComponent.vue + modelo (array competencias, similar a oportunidades)\n- Posible migración JSON en carrera_perfil_egresado\n\nCriterio de aceptación: perfil de egreso muestra competencias identificables, no solo párrafo narrativo.",
                'prioridad' => 'media',
            ],
            [
                'import_id' => 9016,
                'area' => 'Propuestas estratégicas',
                'pagina' => 'Noticias / Blog',
                'titulo' => '[Contenido] Estrategia blog: carreras, empleabilidad y vida universitaria',
                'descripcion' => "Objetivo: contenido sobre carreras, empleabilidad, educación y vida universitaria.\n\nEstado actual: infraestructura lista — noticia.blade.php, detalle-noticia.blade.php, NoticiaComponent.vue, CategoriaNoticia. Home muestra teaser en index.blade.php.\n\nAcción principal: contenido y categorías (empleabilidad, vida universitaria, carreras). Mejoras técnicas opcionales:\n- Tags funcionales en detalle-noticia (hoy apuntan a #)\n- limit(6) en WebController::index() según @features/03-limit-home-noticias.md\n\nCriterio de aceptación: categorías editoriales definidas y publicación regular de artículos alineados a la propuesta.",
                'prioridad' => 'baja',
            ],
        ];

        $now = now();
        $rows = [];

        foreach ($items as $index => $item) {
            $rows[] = [
                'area' => $item['area'],
                'pagina' => $item['pagina'],
                'carpeta_origen' => '7 - PROPUESTAS ESTRATÉGICAS WEB',
                'titulo' => $item['titulo'],
                'descripcion' => $item['descripcion'],
                'tipo' => 'propuesta',
                'archivo_origen' => 'Propuestas estratégicas UPRIT Web (análisis 2026-08-24)',
                'estado' => 'pendiente',
                'prioridad' => $item['prioridad'],
                'es_duplicado' => false,
                'duplicado_de' => null,
                'import_id' => $item['import_id'],
                'orden' => $ordenBase + $index + 1,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('observaciones')->insert($rows);
    }

    public function down(): void
    {
        if (! Schema::hasTable('observaciones')) {
            return;
        }

        DB::table('observaciones')
            ->whereIn('import_id', self::IMPORT_IDS)
            ->delete();
    }
};
