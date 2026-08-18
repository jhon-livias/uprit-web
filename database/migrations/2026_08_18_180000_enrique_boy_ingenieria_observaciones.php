<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private const INDUSTRIAL_CARRERAS = [8, 26];

    private const SISTEMAS_CARRERAS = [9, 27];

    private const BOY_IMPORT_IDS = [81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110];

    public function up(): void
    {
        $this->addTituloOportunidadesColumn();
        $this->updateIndustrialDescripcion();
        $this->updateIndustrialFaqs();
        $this->upsertDocentes();
        $this->markObservacionesEnRevision();
    }

    public function down(): void
    {
        if (Schema::hasColumn('carrera_descripcion', 'titulo_oportunidades')) {
            Schema::table('carrera_descripcion', function (Blueprint $table) {
                $table->dropColumn('titulo_oportunidades');
            });
        }

        if (Schema::hasTable('observaciones')) {
            DB::table('observaciones')
                ->whereIn('import_id', self::BOY_IMPORT_IDS)
                ->update(['estado' => 'pendiente', 'updated_at' => now()]);
        }
    }

    private function addTituloOportunidadesColumn(): void
    {
        if (! Schema::hasTable('carrera_descripcion') || Schema::hasColumn('carrera_descripcion', 'titulo_oportunidades')) {
            return;
        }

        Schema::table('carrera_descripcion', function (Blueprint $table) {
            $table->string('titulo_oportunidades', 500)->nullable()->after('descripcion');
        });
    }

    private function updateIndustrialDescripcion(): void
    {
        if (! Schema::hasTable('carrera_descripcion')) {
            return;
        }

        $descripcion = 'La carrera de Ingeniería Industrial en la UPRIT forma profesionales capacitados para diseñar, gestionar y optimizar procesos productivos y organizacionales. El programa integra conocimientos en producción, calidad, logística, seguridad, gestión empresarial y tecnologías aplicadas, orientados a mejorar la productividad, optimizar recursos y contribuir al desarrollo sostenible de las organizaciones.';

        $tituloOportunidades = 'El egresado de Ingeniería Industrial podrá desempeñarse en organizaciones públicas y privadas en áreas como:';

        $oportunidades = [
            'Ingeniero de Procesos',
            'Jefe de Producción y Operaciones',
            'Especialista en Logística y Cadena de Suministro',
            'Especialista en Gestión de la Calidad',
            'Especialista en Seguridad y Salud en el Trabajo',
            'Analista de Planeamiento y Mejora Continua',
            'Analista de Datos para la Toma de Decisiones',
            'Gestor de Proyectos',
            'Consultor en Optimización de Procesos',
            'Emprendedor y Gestor de Negocios Industriales',
        ];

        foreach (self::INDUSTRIAL_CARRERAS as $carreraId) {
            $payload = [
                'descripcion' => $descripcion,
                'oportunidades' => json_encode($oportunidades, JSON_UNESCAPED_UNICODE),
                'updated_at' => now(),
            ];

            if (Schema::hasColumn('carrera_descripcion', 'titulo_oportunidades')) {
                $payload['titulo_oportunidades'] = $tituloOportunidades;
            }

            $updated = DB::table('carrera_descripcion')
                ->where('carrera_id', $carreraId)
                ->update($payload);

            if ($updated === 0) {
                DB::table('carrera_descripcion')->insert(array_merge($payload, [
                    'carrera_id' => $carreraId,
                    'created_at' => now(),
                ]));
            }
        }
    }

    private function updateIndustrialFaqs(): void
    {
        if (! Schema::hasTable('carrera_preguntas')) {
            return;
        }

        $updates = [
            [
                'match' => 'diferencia a esta carrera de otras ingenier',
                'pregunta' => '¿Qué diferencia a esta carrera de otras ingenierías?',
                'respuesta' => 'La Ingeniería Industrial integra procesos, personas, tecnología y recursos para mejorar la productividad, la calidad y la eficiencia de las organizaciones.',
            ],
            [
                'match' => 'trabajar mientras se estudia',
                'pregunta' => '¿Se puede trabajar mientras se estudia?',
                'respuesta' => 'Sí. La carrera también se ofrece en modalidad a distancia, brindando mayor flexibilidad para organizar los estudios y compatibilizarlos con otras actividades.',
            ],
            [
                'match' => 'validez internacional',
                'pregunta' => '¿El título tiene validez internacional?',
                'respuesta' => 'Sí, con reconocimiento en países de Latinoamérica.',
            ],
            [
                'match' => 'valido internacionalmente',
                'pregunta' => '¿El título tiene validez internacional?',
                'respuesta' => 'Sí, con reconocimiento en países de Latinoamérica.',
            ],
            [
                'match' => 'sostenibilidad',
                'pregunta' => '¿La carrera incorpora un enfoque de sostenibilidad?',
                'respuesta' => 'Sí. El plan de estudios incorpora criterios de sostenibilidad y gestión ambiental, mediante asignaturas como Ecología e Impacto Ambiental.',
            ],
            [
                'match' => 'convalidar cursos si provengo',
                'pregunta' => '¿Puedo convalidar cursos si provengo de otra universidad o instituto?',
                'respuesta' => 'Sí. Puedes solicitar la convalidación de asignaturas cursadas en una institución de educación superior reconocida o licenciada por la SUNEDU, según corresponda. La convalidación está sujeta a la evaluación de contenidos, créditos y horas académicas, de acuerdo con la normativa y los procedimientos establecidos por la UPRIT.',
            ],
            [
                'match' => 'clases son grabadas',
                'pregunta' => '¿Las clases son grabadas?',
                'respuesta' => 'Sí. Las clases se desarrollan en vivo de manera sincrónica y quedan grabadas en el aula virtual, permitiendo que los estudiantes puedan revisarlas posteriormente.',
            ],
        ];

        foreach (self::INDUSTRIAL_CARRERAS as $carreraId) {
            foreach ($updates as $item) {
                DB::table('carrera_preguntas')
                    ->where('carrera_id', $carreraId)
                    ->where('pregunta', 'like', '%'.$item['match'].'%')
                    ->update([
                        'pregunta' => $item['pregunta'],
                        'respuesta' => $item['respuesta'],
                        'updated_at' => now(),
                    ]);
            }
        }
    }

    private function upsertDocentes(): void
    {
        if (! Schema::hasTable('docentes') || ! Schema::hasTable('carrera_docente')) {
            return;
        }

        $enriqueBio = 'Cuenta con trayectoria académica y profesional en ingeniería industrial, gestión empresarial, investigación e innovación. Es Ingeniero Industrial, con Maestría en Administración de Negocios y doctorando en Ciencias e Ingeniería. Actualmente, coordina las carreras de Ingeniería Industrial e Ingeniería de Sistemas e Inteligencia Artificial, y posee experiencia docente universitaria. Es autor y coautor de libros y publicaciones científicas, incluyendo un artículo Q1 vinculado con teledetección e inteligencia artificial. Sus investigaciones abarcan gestión empresarial, innovación tecnológica y seguridad y salud ocupacional. Asimismo, se desempeña como Gerente General de CALCIEMSA E.I.R.L. e INVESTIMAS S.A.C., y cuenta con experiencia como ponente en el Colegio de Ingenieros del Perú y como campeón regional de oratoria del Foro de Oradores del Perú.';

        $hanielBio = 'Cuenta con una sólida formación académica y profesional en los campos de la ingeniería química, la ingeniería ambiental, la bioinnovación y la sostenibilidad. Obtuvo el título profesional de Ingeniero Químico y posteriormente fortaleció su formación de posgrado mediante estudios de Maestría y Doctorado en Ingeniería Química Ambiental. Complementando su preparación académica, cuenta con un Diplomado en Tecnología de la Información e Inteligencia Artificial por la Universidad Internacional de La Rioja (UNIR), España, incorporando conocimientos relacionados con las nuevas tecnologías y su aplicación en ámbitos científicos y profesionales. Se ha especializado en biofertilizantes y energías renovables, áreas en las que desarrolla actividades vinculadas con la investigación, innovación y aplicación de soluciones sostenibles. Asimismo, se desempeña como consultor en bioinnovación y sostenibilidad ambiental, participando en iniciativas orientadas al aprovechamiento responsable de los recursos y al desarrollo de alternativas tecnológicas con enfoque ambiental. Su trayectoria en investigación se encuentra respaldada por su reconocimiento como Investigador RENACYT Nivel V, evidenciando su participación y producción en actividades de investigación científica, desarrollo tecnológico e innovación.';

        $charlenBio = 'Cuenta con una sólida trayectoria en ingeniería industrial, tecnologías de la información e innovación. Es Ingeniero Industrial, con Maestría en Ingeniería de Sistemas con mención en Tecnologías de la Información e Investigador RENACYT Nivel VI, especializado en desarrollo tecnológico, transformación digital y propiedad intelectual. Su experiencia se centra en Inteligencia Artificial, Automatización Industrial 4.0, Internet de las Cosas (IoT), robótica y fabricación digital. Es miembro de IEEE y participa activamente en investigación, docencia y desarrollo de soluciones tecnológicas aplicadas a la industria y la sociedad. Ha sido ponente internacional en Perú, Colombia, México y Tailandia, y cuenta con reconocimientos en competencias de innovación nacionales e internacionales organizadas por Huawei, UNI, Hack4edu y Robotifest, entre otras. Su perfil integra investigación, innovación y transferencia tecnológica orientadas a generar soluciones de impacto.';

        $joseBio = 'Cuenta con una sólida formación académica y profesional en ingeniería informática, tecnologías de la información, investigación y docencia universitaria. Es Ingeniero Informático por la Universidad Nacional de Trujillo, cuenta con una Segunda Especialidad en Tecnología e Informática Educativa, dos grados de maestría en Educación e Ingeniería Informática y de Sistemas, y es Doctor en Ingeniería de Sistemas e Informática. Es autor de diversos libros especializados en programación, algoritmos, redes, UML, marketing electrónico y tecnologías digitales. Asimismo, es Investigador RENACYT, fundador y creador de la revista científica Technologica, además de desarrollador de software. Cuenta con amplia experiencia como docente universitario en diferentes universidades del país, así como asesor y consultor empresarial en tecnologías de la información, integrando investigación, desarrollo tecnológico y transformación digital.';

        $this->upsertDocente([
            'nombre' => 'Ms. Enrique Jannier Boy Vasquez',
            'correo' => 'enrique.boy@uprit.edu.pe',
            'departamento' => 'Ingeniería',
            'tags' => json_encode(['Docente', 'Coordinador'], JSON_UNESCAPED_UNICODE),
            'descripcion' => $enriqueBio,
        ], array_merge(self::INDUSTRIAL_CARRERAS, self::SISTEMAS_CARRERAS));

        $this->upsertDocente([
            'nombre' => 'Dr. Haniel Solis Muñoz',
            'correo' => 'haniel.solis@uprit.edu.pe',
            'departamento' => 'Ingeniería',
            'tags' => json_encode(['Docente'], JSON_UNESCAPED_UNICODE),
            'descripcion' => $hanielBio,
        ], self::INDUSTRIAL_CARRERAS);

        $this->upsertDocente([
            'nombre' => 'Charlen Calero Huamán',
            'correo' => 'charlen.calero@gmail.com',
            'departamento' => 'Ingeniería',
            'tags' => json_encode(['Docente', 'Investigación'], JSON_UNESCAPED_UNICODE),
            'descripcion' => $charlenBio,
        ], self::SISTEMAS_CARRERAS, ['charlen.calero@uprit.edu.pe']);

        $this->upsertDocente([
            'nombre' => 'Dr. Jose Arturo Diaz Pulido',
            'correo' => 'Jose.diaz@uprit.edu.pe',
            'departamento' => 'Ingeniería',
            'tags' => json_encode(['Docente'], JSON_UNESCAPED_UNICODE),
            'descripcion' => $joseBio,
        ], self::SISTEMAS_CARRERAS);

        $fiorella = DB::table('docentes')->where('correo', 'fiorella.espinoza@uprit.edu.pe')->first();
        if ($fiorella) {
            $this->attachDocenteToCarreras((int) $fiorella->id, self::INDUSTRIAL_CARRERAS);
        }
    }

    private function upsertDocente(array $data, array $carreraIds, array $legacyEmails = []): void
    {
        $emails = array_values(array_filter(array_unique(array_merge([$data['correo']], $legacyEmails))));

        $docente = DB::table('docentes')->whereIn('correo', $emails)->first();

        $payload = array_merge($data, ['updated_at' => now()]);

        if ($docente) {
            DB::table('docentes')->where('id', $docente->id)->update($payload);
            $docenteId = (int) $docente->id;
        } else {
            $docenteId = (int) DB::table('docentes')->insertGetId(array_merge($payload, [
                'created_at' => now(),
            ]));
        }

        $this->attachDocenteToCarreras($docenteId, $carreraIds);
    }

    private function attachDocenteToCarreras(int $docenteId, array $carreraIds): void
    {
        foreach ($carreraIds as $carreraId) {
            DB::table('carrera_docente')->insertOrIgnore([
                'carrera_id' => $carreraId,
                'docente_id' => $docenteId,
            ]);
        }
    }

    private function markObservacionesEnRevision(): void
    {
        if (! Schema::hasTable('observaciones')) {
            return;
        }

        DB::table('observaciones')
            ->whereIn('import_id', self::BOY_IMPORT_IDS)
            ->update([
                'estado' => 'en_revision',
                'updated_at' => now(),
            ]);
    }
};
