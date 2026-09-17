<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private const NOMBRES_INICIAL = ['Educación Inicial'];

    private const NOMBRES_PRIMARIA = ['Educación Primaria'];

    private const NOMBRES_CS = ['Educación Secundaria con Mención en Ciencias Sociales'];

    private const MODALIDADES = "Presencial\nSemipresencial\nA Distancia";

    public function up(): void
    {
        $this->updateModalidades();
        $this->replaceMallas();
        $this->removeManfrediDeEducacion();
        $this->syncDocentes();
        $this->seedCertificaciones();
        $this->markKanbanEnRevision();
    }

    public function down(): void
    {
        // Contenido editorial no reversible de forma segura.
    }

    private function updateModalidades(): void
    {
        if (! Schema::hasTable('carreras')) {
            return;
        }

        $ids = $this->carreraIds(array_merge(
            self::NOMBRES_INICIAL,
            self::NOMBRES_PRIMARIA,
            self::NOMBRES_CS
        ));

        if ($ids === []) {
            return;
        }

        DB::table('carreras')
            ->whereIn('id', $ids)
            ->update([
                'modalidades' => self::MODALIDADES,
                'updated_at' => now(),
            ]);
    }

    private function replaceMallas(): void
    {
        if (! Schema::hasTable('carrera_malla_curricular')) {
            return;
        }

        $this->replaceMallaFor(
            $this->carreraIds(self::NOMBRES_INICIAL),
            $this->mallaInicial()
        );
        $this->replaceMallaFor(
            $this->carreraIds(self::NOMBRES_PRIMARIA),
            $this->mallaPrimaria()
        );
        $this->replaceMallaFor(
            $this->carreraIds(self::NOMBRES_CS),
            $this->mallaCienciasSociales()
        );
    }

    /**
     * @param  list<int>  $carreraIds
     * @param  list<array{ciclo: string, descripcion: string, cursos: list<string>}>  $ciclos
     */
    private function replaceMallaFor(array $carreraIds, array $ciclos): void
    {
        foreach ($carreraIds as $carreraId) {
            DB::table('carrera_malla_curricular')->where('carrera_id', $carreraId)->delete();

            foreach ($ciclos as $ciclo) {
                DB::table('carrera_malla_curricular')->insert([
                    'carrera_id' => $carreraId,
                    'ciclo' => $ciclo['ciclo'],
                    'descripcion' => $ciclo['descripcion'],
                    'cursos' => json_encode($ciclo['cursos'], JSON_UNESCAPED_UNICODE),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    private function removeManfrediDeEducacion(): void
    {
        if (! Schema::hasTable('docentes') || ! Schema::hasTable('carrera_docente') || ! Schema::hasTable('carreras')) {
            return;
        }

        $docenteIds = DB::table('docentes')
            ->where(function ($query) {
                $query->where('correo', 'antonio.fernandez@uprit.edu.pe')
                    ->orWhere('nombre', 'like', '%Manfredi%');
            })
            ->pluck('id');

        if ($docenteIds->isEmpty()) {
            return;
        }

        $educacionIds = DB::table('carreras')
            ->where('nombre', 'like', 'Educación%')
            ->pluck('id');

        if ($educacionIds->isEmpty()) {
            return;
        }

        DB::table('carrera_docente')
            ->whereIn('docente_id', $docenteIds)
            ->whereIn('carrera_id', $educacionIds)
            ->delete();
    }

    private function syncDocentes(): void
    {
        if (! Schema::hasTable('docentes') || ! Schema::hasTable('carrera_docente')) {
            return;
        }

        $inicialIds = $this->carreraIds(self::NOMBRES_INICIAL);
        $primariaIds = $this->carreraIds(self::NOMBRES_PRIMARIA);
        $csIds = $this->carreraIds(self::NOMBRES_CS);

        $valverde = $this->upsertDocente(
            'Karin Araceli Valverde Reyes',
            ['Docente'],
            'Profesora de Educación Inicial, Licenciada en Educación Primaria, Magíster en Psicología Educativa, Investigación y Docencia Universitaria, Segunda Especialidad en Problemas de Aprendizaje y Doctoranda en Ciencias de la Educación. Cuenta con experiencia en Educación Inicial y Educación Superior Universitaria, destacando en investigación, producción académica, educación inclusiva, desarrollo infantil y psicopedagogía. Ha participado en la elaboración de artículos científicos y proyectos académicos y de responsabilidad social. Se caracteriza por su liderazgo, sensibilidad, compromiso, innovación pedagógica y vocación de servicio.'
        );

        $alza = $this->findDocenteByCorreoOrNombre('norma.alza@uprit.edu.pe', 'Norma Caridad Alza');
        $loyola = $this->upsertDocente(
            'Milagritos Carolina Loyola Marquezado',
            ['Docente'],
            'Licenciada en Educación Inicial, con Maestría en Gestión Educativa y Segunda Especialidad en Proyectos Educativos. Cuenta con 30 años de experiencia en la docencia de aula, trayectoria que refleja su vocación y compromiso con la educación y el desarrollo integral de los niños y niñas. Asimismo, cuenta con 1 año y 6 meses de experiencia como docente formadora en el Instituto Superior Privado Oxford, contribuyendo a la formación de futuras profesionales de Educación Inicial. Durante su trayectoria profesional, ha recibido diversos reconocimientos, entre ellos por su desempeño como Directora Encargada de la I.E. Triunfo, La Esperanza – UGEL 02, y un reconocimiento por el Día del Maestro otorgado por la Municipalidad de La Esperanza. Se caracteriza por su perseverancia, vocación, creatividad e innovación, asumiendo nuevos retos con responsabilidad y entusiasmo. Su compromiso con el desarrollo integral infantil en la primera infancia orienta su práctica profesional, manteniendo además el firme propósito de seguir creciendo y fortaleciendo su experiencia en el ámbito de la docencia universitaria.'
        );
        $cuevaCarrera = $this->findDocenteByCorreoOrNombre('maribel.cueva@uprit.edu.pe', 'Maribel Janeth Cueva Carrera');

        $this->syncCarreraDocentes($inicialIds, array_values(array_filter([
            $valverde,
            $alza,
            $loyola,
            $cuevaCarrera,
        ])));

        $munoz = $this->findDocenteByCorreoOrNombre('lucia.munoz@uprit.edu.pe', 'Lucia Violeta Muñoz Aguilar');
        $guzman = $this->findDocenteByCorreoOrNombre('edith.guzman@uprit.edu.pe', 'Edith Guzmán López');
        $cuevaTorres = $this->findDocenteByCorreoOrNombre('julio.cueva@uprit.edu.pe', 'Julio César Cueva Torres');

        $this->syncCarreraDocentes($primariaIds, array_values(array_filter([
            $munoz,
            $guzman,
            $cuevaTorres,
        ])));

        $hibon = $this->upsertDocente(
            'Sandra Hibon Flores Maqui',
            ['Docente', 'Coordinadora de Carrera'],
            'Licenciada en Educación Secundaria con mención en Filosofía, Psicología y Ciencias Sociales, Magíster en Psicología Educativa y doctoranda en Ciencias de la Educación. Cuenta con amplia experiencia en docencia universitaria, gestión académica e investigación educativa, así como trayectoria profesional en el Ministerio de Educación. Recibió reconocimientos por parte de la UGEL y participó como miembro de jurado en diversos concursos educativos promovidos por el Ministerio de Educación. En el ámbito universitario, ha desempeñado cargos como coordinadora académica de facultad, coordinadora de carrera y coordinadora de programas de Segundas Especialidades. Asimismo, se ha desempeñado como docente investigadora y autora de publicaciones académicas, con especial interés en la formación docente y la mejora de los procesos educativos. Su compromiso profesional es contribuir a una educación de calidad, inclusiva, humanista e innovadora, integrando la docencia, la investigación y la gestión académica.'
        );
        $uceda = $this->upsertDocente(
            'Melita Fiorella Uceda Casana',
            ['Docente'],
            'Profesional de la educación egresada de la Universidad Nacional de Trujillo, Licenciada en Educación Secundaria en la especialidad de Historia y Geografía y Maestra en Educación con mención en Gestión Educativa. Su perfil articula el dominio de la praxis pedagógica con la dirección estratégica de instituciones formativas, respaldado por una constante actualización en neuroliderazgo, evaluación formativa e innovación pedagógica en contextos disruptivos. Destaca por su experiencia en el diseño de estrategias didácticas para el desarrollo del pensamiento crítico, la conciencia histórica y el análisis espacial, complementada con su desempeño docente en la Universidad Católica de Trujillo. Cuenta con sólidas competencias en liderazgo pedagógico, gestión de proyectos, diseño curricular, mediación de conflictos e integración de herramientas tecnológicas. A lo largo de su trayectoria, ha demostrado un firme compromiso con la excelencia académica, la gestión institucional, la mejora de la calidad educativa y el fortalecimiento de la identidad cultural.'
        );
        $ramirez = $this->upsertDocente(
            'Rocío Liliana Ramirez Cabanillas',
            ['Docente'],
            'Licenciada en Educación Secundaria Mención: Filosofía, Psicología y CCSS, egresada del tercio superior de la Universidad Nacional de Trujillo, con una Maestría en Docencia y Gestión Educativa. Cuenta con una amplia trayectoria en la docencia con más de veinte años de experiencia en los niveles de inicial, primaria, secundaria y superior, combinando una sólida base científica y humanística con competencias avanzadas en el diseño curricular y liderazgo escolar. Destaca en la enseñanza en la especialidad de Desarrollo de Inteligencia Emocional, Psicología del Delincuente, Psicología Aplicada a la Función Policial y Psicología Social en la Escuela Técnico Superior PNP Trujillo; en Cultura General y Desarrollo Personal en la Universidad Particular César Vallejo; en Psicología y Filosofía en la Universidad Privada de Trujillo; y en Desarrollo Personal en instituciones educativas públicas y privadas hasta la actualidad. Comprometida con la excelencia y la capacitación pedagógica y tecnológica permanente para responder con éxito a las exigencias digitales y metodológicas actuales.'
        );

        $this->syncCarreraDocentes($csIds, array_values(array_filter([
            $hibon,
            $uceda,
            $ramirez,
        ])));
    }

    private function seedCertificaciones(): void
    {
        if (! Schema::hasTable('carrera_certificaciones')) {
            return;
        }

        $primaria = $this->certificacionesPrimaria();
        $cs = $this->certificacionesCienciasSociales();

        foreach ($this->carreraIds(self::NOMBRES_PRIMARIA) as $carreraId) {
            $this->replaceCertificaciones($carreraId, $primaria);
        }

        foreach ($this->carreraIds(self::NOMBRES_CS) as $carreraId) {
            $this->replaceCertificaciones($carreraId, $cs);
        }
    }

    /**
     * @param  list<array<string, mixed>>  $items
     */
    private function replaceCertificaciones(int $carreraId, array $items): void
    {
        DB::table('carrera_certificaciones')->where('carrera_id', $carreraId)->delete();

        foreach ($items as $index => $item) {
            DB::table('carrera_certificaciones')->insert([
                'carrera_id' => $carreraId,
                'orden' => $index + 1,
                'titulo' => $item['titulo'],
                'nombre' => $item['nombre'],
                'ciclo' => $item['ciclo'],
                'requisitos' => $item['requisitos'],
                'cursos' => json_encode($item['cursos'], JSON_UNESCAPED_UNICODE),
                'competencias' => json_encode($item['competencias'], JSON_UNESCAPED_UNICODE),
                'perfil_salida' => $item['perfil_salida'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function markKanbanEnRevision(): void
    {
        if (! Schema::hasTable('observaciones')) {
            return;
        }

        DB::table('observaciones')
            ->whereIn('import_id', [9004, 9006, 9010, 9011, 9013])
            ->update([
                'estado' => 'en_revision',
                'updated_at' => now(),
            ]);
    }

    /**
     * @param  list<string>  $nombres
     * @return list<int>
     */
    private function carreraIds(array $nombres): array
    {
        if (! Schema::hasTable('carreras') || ! Schema::hasTable('categorias')) {
            return [];
        }

        return DB::table('carreras')
            ->join('categorias', 'categorias.id', '=', 'carreras.categoria_id')
            ->whereIn('carreras.nombre', $nombres)
            ->whereIn('categorias.nivel_academico_id', [3, 4])
            ->pluck('carreras.id')
            ->map(fn ($id) => (int) $id)
            ->all();
    }

    /**
     * @param  list<string>  $tags
     */
    private function upsertDocente(string $nombre, array $tags, string $descripcion): int
    {
        $existente = $this->findDocenteByNombre($nombre);

        $payload = [
            'nombre' => $nombre,
            'tags' => json_encode($tags, JSON_UNESCAPED_UNICODE),
            'departamento' => 'Humanidades',
            'descripcion' => $descripcion,
            'updated_at' => now(),
        ];

        if ($existente) {
            DB::table('docentes')->where('id', $existente)->update($payload);

            return $existente;
        }

        return (int) DB::table('docentes')->insertGetId(array_merge($payload, [
            'created_at' => now(),
        ]));
    }

    private function findDocenteByCorreoOrNombre(string $correo, string $nombre): ?int
    {
        $byCorreo = DB::table('docentes')->where('correo', $correo)->value('id');
        if ($byCorreo) {
            return (int) $byCorreo;
        }

        return $this->findDocenteByNombre($nombre);
    }

    private function findDocenteByNombre(string $nombre): ?int
    {
        $needle = $this->normalizeName($nombre);

        foreach (DB::table('docentes')->get(['id', 'nombre']) as $row) {
            if ($this->normalizeName((string) $row->nombre) === $needle) {
                return (int) $row->id;
            }
        }

        foreach (DB::table('docentes')->get(['id', 'nombre']) as $row) {
            $haystack = $this->normalizeName((string) $row->nombre);
            if ($haystack !== '' && (str_contains($haystack, $needle) || str_contains($needle, $haystack))) {
                return (int) $row->id;
            }
        }

        return null;
    }

    private function normalizeName(string $nombre): string
    {
        $nombre = mb_strtolower($nombre, 'UTF-8');
        $repl = [
            'á' => 'a', 'é' => 'e', 'í' => 'i', 'ó' => 'o', 'ú' => 'u',
            'ü' => 'u', 'ñ' => 'n',
        ];
        $nombre = strtr($nombre, $repl);

        return preg_replace('/[^a-z]/', '', $nombre) ?? $nombre;
    }

    /**
     * @param  list<int>  $carreraIds
     * @param  list<int>  $docenteIds
     */
    private function syncCarreraDocentes(array $carreraIds, array $docenteIds): void
    {
        foreach ($carreraIds as $carreraId) {
            DB::table('carrera_docente')->where('carrera_id', $carreraId)->delete();

            foreach ($docenteIds as $docenteId) {
                DB::table('carrera_docente')->insert([
                    'carrera_id' => $carreraId,
                    'docente_id' => $docenteId,
                ]);
            }
        }
    }

    /**
     * @return list<array{ciclo: string, descripcion: string, cursos: list<string>}>
     */
    private function mallaInicial(): array
    {
        return [
            [
                'ciclo' => 'Ciclo I',
                'descripcion' => 'Desarrollar capacidades básicas en comunicación, razonamiento lógico, historia, inglés y fundamentos de educación inicial, sentando las bases pedagógicas y contextuales necesarias para una formación integral centrada en la infancia y su desarrollo temprano.',
                'cursos' => [
                    'Inglés I',
                    'Matemática Básica',
                    'Comunicación',
                    'Lógica General',
                    'Historia del Perú en el Contexto Mundial Contemporáneo',
                    'Fundamentos de la Educación Inicial',
                ],
            ],
            [
                'ciclo' => 'Ciclo II',
                'descripcion' => 'Fortalecer habilidades comunicativas, matemáticas y humanísticas, con énfasis en expresión escrita, didáctica general y creatividad, ampliando la comprensión del rol docente en la formación de niños desde una perspectiva inclusiva y reflexiva.',
                'cursos' => [
                    'Inglés II',
                    'Taller de Expresión Escrita',
                    'Matemática Financiera',
                    'Realidad Nacional y Derechos Humanos',
                    'Didáctica General',
                    'Creatividad y Expresión Gráfico Plástica',
                ],
            ],
            [
                'ciclo' => 'Ciclo III',
                'descripcion' => 'Consolidar competencias en estadística, TIC, ética y psicomotricidad, integrando enfoques pedagógicos para comprender problemas de aprendizaje y promover una atención educativa integral desde los primeros años de vida.',
                'cursos' => [
                    'Problemas de Aprendizaje en los Niños I',
                    'Quechua I',
                    'TIC Aplicadas a la Educación',
                    'Ética y Responsabilidad Profesional',
                    'Estadística y Probabilidades',
                    'Educación Psicomotriz en los Tres Primeros Años',
                ],
            ],
            [
                'ciclo' => 'Ciclo IV',
                'descripcion' => 'Profundizar en la investigación científica, idiomas, cultura andina y práctica pedagógica inicial, orientando la formación hacia una docencia crítica, inclusiva y fundamentada en evidencia para el acompañamiento del desarrollo infantil.',
                'cursos' => [
                    'Problemas de Aprendizaje en los Niños II',
                    'Quechua II',
                    'Inglés III',
                    'Metodología de la Investigación Científica',
                    'Actividades de Proyección Social y Vida Universitaria',
                    'Introducción a la Práctica Preprofesional Pedagógica',
                ],
            ],
            [
                'ciclo' => 'Ciclo V',
                'descripcion' => 'Desarrollar capacidades en salud infantil, psicomotricidad, cognición temprana y expresión musical, mediante prácticas pedagógicas activas que permitan un acompañamiento educativo adecuado y creativo para niños de 0 a 5 años.',
                'cursos' => [
                    'Teoría del Desarrollo de Jean Piaget',
                    'Salud Infantil y Prevención de Emergencias',
                    'Iniciación Musical Infantil en los Tres Primeros Años',
                    'Educación Psicomotriz de 3 a 5 Años',
                    'Desarrollo Cognoscitivo en los 5 Primeros Años',
                    'Práctica Preprofesional Pedagógica I',
                ],
            ],
            [
                'ciclo' => 'Ciclo VI',
                'descripcion' => 'Aplicar estrategias pedagógicas en literatura, pensamiento lógico, desarrollo psicosocial y entornos virtuales de aprendizaje, promoviendo la innovación didáctica para fortalecer el desarrollo integral en la educación inicial.',
                'cursos' => [
                    'E-Learning en Enseñanza y Aprendizaje Virtual',
                    'Literatura Infantil y Dramatización',
                    'Iniciación del Pensamiento Lógico Matemático',
                    'Desarrollo Psicosocial en los 5 Primeros Años',
                    'Práctica Preprofesional Pedagógica II',
                ],
            ],
            [
                'ciclo' => 'Ciclo VII',
                'descripcion' => 'Fortalecer conocimientos en neurociencia, inclusión, ciencias naturales y programas sociales para la infancia, desarrollando habilidades prácticas y reflexivas para una atención educativa oportuna, diversa y contextualizada.',
                'cursos' => [
                    'Programas y Servicios Educativos Dirigidos a Niños Menores de 6 Años',
                    'Neurociencia Infantil',
                    'Electivo I',
                    'Didáctica de las Ciencias Naturales en Educación Inicial',
                    'Educación Inclusiva para Niños de Inicial',
                    'Práctica Preprofesional Pedagógica III',
                ],
            ],
            [
                'ciclo' => 'Ciclo VIII',
                'descripcion' => 'Consolidar competencias en tutoría, expresión artística y práctica docente, reforzando el acompañamiento emocional y la formación integral del niño a través de metodologías participativas y estrategias personalizadas.',
                'cursos' => [
                    'Orientación Educativa y Gestión de la Tutoría',
                    'Electivo II',
                    'Taller de Dramatización Infantil',
                    'Taller de Canto en Niños de Educación Inicial',
                    'Práctica Preprofesional Pedagógica IV',
                ],
            ],
            [
                'ciclo' => 'Ciclo IX',
                'descripcion' => 'Desarrollar capacidades investigativas, curriculares y prácticas pedagógicas avanzadas, promoviendo una intervención educativa fundamentada, con enfoque reflexivo y contextual para la mejora de la calidad educativa inicial.',
                'cursos' => [
                    'Educación Sexual y Salud Reproductiva',
                    'Electivo III',
                    'Programación y Diversificación Curricular en Educación Inicial',
                    'Seminario de Tesis',
                    'Práctica Preprofesional Pedagógica V',
                ],
            ],
            [
                'ciclo' => 'Ciclo X',
                'descripcion' => 'Culminar la formación profesional mediante investigación aplicada, análisis del desarrollo infantil y práctica docente final, integrando saberes teóricos, prácticos y éticos para un desempeño profesional comprometido con la primera infancia.',
                'cursos' => [
                    'Problemas del Desarrollo Infantil',
                    'Trabajo de Investigación',
                    'Práctica Preprofesional Pedagógica VI',
                ],
            ],
            [
                'ciclo' => 'Cursos electivos',
                'descripcion' => 'El estudiante elige entre estas asignaturas para completar Electivo I, II y III.',
                'cursos' => [
                    'Observación y Documentación Pedagógica en Educación Inicial',
                    'Parentalidad Positiva y Vinculación Familiar',
                    'Alimentación Saludable y Nutrición Infantil',
                    'Educación Emocional y Social en la Primera Infancia',
                    'Mindfulness y Relajación en la Primera Infancia',
                    'Evaluación Auténtica en Educación Inicial',
                ],
            ],
        ];
    }

    /**
     * @return list<array{ciclo: string, descripcion: string, cursos: list<string>}>
     */
    private function mallaPrimaria(): array
    {
        return [
            [
                'ciclo' => 'Ciclo I',
                'descripcion' => 'Introducir al estudiante en las bases del desarrollo infantil, comunicación, matemática básica y cultura peruana, con enfoque en habilidades pedagógicas iniciales.',
                'cursos' => [
                    'Desarrollo Físico y Cognoscitivo de la Niñez Temprana',
                    'Quechua I',
                    'Matemática Básica',
                    'Comunicación',
                    'Lógica General',
                    'Historia del Perú en el Contexto Mundial Contemporáneo',
                ],
            ],
            [
                'ciclo' => 'Ciclo II',
                'descripcion' => 'Profundizar en el desarrollo psicosocial infantil, expresión escrita y didáctica general, junto con el aprendizaje del quechua.',
                'cursos' => [
                    'Desarrollo Psicosocial en la Niñez Temprana',
                    'Quechua II',
                    'Taller de Expresión Escrita',
                    'Matemática Financiera',
                    'Realidad Nacional y Derechos Humanos',
                    'Didáctica General',
                ],
            ],
            [
                'ciclo' => 'Ciclo III',
                'descripcion' => 'Desarrollar competencias en estadística, TIC aplicadas a la educación y atención a problemas de aprendizaje y psicosociales en niños.',
                'cursos' => [
                    'Problemas de Aprendizaje en los Niños I',
                    'Problemas Psicosexuales en los Niños de 5 a 11 Años',
                    'TIC Aplicadas a la Educación',
                    'Quechua III',
                    'Ética y Responsabilidad Profesional',
                    'Estadística y Probabilidades',
                ],
            ],
            [
                'ciclo' => 'Ciclo IV',
                'descripcion' => 'Fortalecer metodologías de investigación, proyección social y práctica pedagógica inicial, con enfoque en diversidad cultural y problemas de aprendizaje.',
                'cursos' => [
                    'Problemas de Aprendizaje en los Niños II',
                    'Quechua IV',
                    'Metodología de la Investigación Científica',
                    'Actividades de Proyección Social y Vida Universitaria',
                    'Introducción a la Práctica Preprofesional Pedagógica',
                ],
            ],
            [
                'ciclo' => 'Ciclo V',
                'descripcion' => 'Integrar tecnologías educativas, didáctica de matemáticas y práctica pedagógica, basada en teorías del desarrollo infantil.',
                'cursos' => [
                    'Teoría del Desarrollo de Jean Piaget',
                    'Didáctica de la Matemática en Primaria I',
                    'Inglés I',
                    'Inteligencia Artificial en Educación',
                    'Recursos Educativos Digitales de Alto Impacto',
                    'Práctica Preprofesional Pedagógica I',
                ],
            ],
            [
                'ciclo' => 'Ciclo VI',
                'descripcion' => 'Aplicar estrategias de e-learning, neurociencia educativa y didáctica de ciencias naturales, junto con prácticas pedagógicas avanzadas.',
                'cursos' => [
                    'Didáctica de las Ciencias Naturales en Primaria I',
                    'E-Learning en Enseñanza y Aprendizaje Virtual',
                    'Didáctica de la Matemática en Primaria II',
                    'Desarrollo Neurocognitivo del Niño',
                    'Inglés II',
                    'Práctica Preprofesional Pedagógica II',
                ],
            ],
            [
                'ciclo' => 'Ciclo VII',
                'descripcion' => 'Desarrollar habilidades en robótica, educación inclusiva, didáctica de comunicación y ciencias naturales, con prácticas pedagógicas supervisadas.',
                'cursos' => [
                    'Didáctica de las Ciencias Naturales en Primaria II',
                    'Educación Inclusiva para Niños de Primaria',
                    'Taller de Robótica para Niños',
                    'Didáctica de la Comunicación para Niños',
                    'Electivo I',
                    'Práctica Preprofesional Pedagógica III',
                ],
            ],
            [
                'ciclo' => 'Ciclo VIII',
                'descripcion' => 'Fomentar creatividad, gestión tutorial, inglés y prácticas pedagógicas intensivas, con enfoque en liderazgo educativo.',
                'cursos' => [
                    'Taller de Canto en Niños de Educación Primaria',
                    'Orientación Educativa y Gestión de la Tutoría',
                    'Inglés III',
                    'Electivo II',
                    'Práctica Preprofesional Pedagógica IV',
                ],
            ],
            [
                'ciclo' => 'Ciclo IX',
                'descripcion' => 'Profundizar en programación curricular, ajedrez educativo y seminario de investigación, culminando con prácticas pedagógicas avanzadas.',
                'cursos' => [
                    'Enseñanza del Ajedrez para Niños',
                    'Programación y Diversificación Curricular en Educación Primaria',
                    'Electivo III',
                    'Seminario de Tesis',
                    'Práctica Preprofesional Pedagógica V',
                ],
            ],
            [
                'ciclo' => 'Ciclo X',
                'descripcion' => 'Consolidar competencias en evaluación en línea, investigación educativa y práctica profesional final para la obtención del título.',
                'cursos' => [
                    'Programación Curricular y Estrategias de Evaluación en Línea',
                    'Trabajo de Investigación',
                    'Práctica Preprofesional Pedagógica VI',
                ],
            ],
            [
                'ciclo' => 'Cursos electivos',
                'descripcion' => 'El estudiante elige entre estas asignaturas para completar Electivo I, II y III.',
                'cursos' => [
                    'Educación Primaria con Enfoque Intercultural Bilingüe',
                    'Proyectos Escolares en Educación Ambiental y Sostenibilidad',
                    'Arte y Creatividad en la Educación Primaria',
                    'Estrategias de Liderazgo Educativo y Gestión del Aula en Educación Primaria',
                    'Gestión de Conflictos y Convivencia Escolar en Primaria',
                    'Innovación Educativa y Metodologías Activas en Niños de Primaria',
                ],
            ],
        ];
    }

    /**
     * @return list<array{ciclo: string, descripcion: string, cursos: list<string>}>
     */
    private function mallaCienciasSociales(): array
    {
        return [
            [
                'ciclo' => 'Ciclo I',
                'descripcion' => 'Establecer una base sólida en comunicación, matemáticas, lógica, historia y fundamentos sociales, desarrollando habilidades para el análisis crítico y la comprensión del entorno cultural y ciudadano.',
                'cursos' => [
                    'Quechua I',
                    'Pedagogía General',
                    'Matemática Básica',
                    'Comunicación',
                    'Lógica General',
                    'Historia del Perú en el Contexto Mundial Contemporáneo',
                ],
            ],
            [
                'ciclo' => 'Ciclo II',
                'descripcion' => 'Introducir nociones de psicología y didáctica general, integrando estudios de cultura, identidad y ciudadanía, y promoviendo el pensamiento crítico para interpretar la realidad social.',
                'cursos' => [
                    'Quechua II',
                    'Psicología General',
                    'Taller de Expresión Escrita',
                    'Matemática Financiera',
                    'Realidad Nacional y Derechos Humanos',
                    'Didáctica General',
                ],
            ],
            [
                'ciclo' => 'Ciclo III',
                'descripcion' => 'Consolidar competencias en análisis estadístico, ética y fundamentos históricos, geográficos y políticos, fortaleciendo la comprensión de procesos sociales mediante un enfoque interdisciplinario.',
                'cursos' => [
                    'Psicología Social',
                    'TIC Aplicadas a la Educación',
                    'Quechua III',
                    'Factores Fundamentales de la Geografía del Perú',
                    'Ética y Responsabilidad Profesional',
                    'Estadística y Probabilidades',
                ],
            ],
            [
                'ciclo' => 'Ciclo IV',
                'descripcion' => 'Introducir metodologías de investigación y la práctica pedagógica inicial, fomentando el rigor científico y el pensamiento crítico para evaluar las dinámicas que configuran la sociedad actual.',
                'cursos' => [
                    'Realidad Peruana y Geografía Física',
                    'Quechua IV',
                    'Inglés I',
                    'Metodología de la Investigación Científica',
                    'Actividades de Proyección Social y Vida Universitaria',
                    'Introducción a la Práctica Preprofesional Pedagógica',
                ],
            ],
            [
                'ciclo' => 'Ciclo V',
                'descripcion' => 'Fomentar competencias pedagógicas específicas en ciencias sociales, integrando historia, economía, inteligencia artificial y didáctica de la matemática.',
                'cursos' => [
                    'Historia de América',
                    'Economía I',
                    'Inteligencia Artificial en Educación',
                    'Inglés II',
                    'Didáctica de la Matemática',
                    'Práctica Preprofesional Pedagógica I',
                ],
            ],
            [
                'ciclo' => 'Ciclo VI',
                'descripcion' => 'Profundizar en teorías del cambio social, conducta adolescente y sociología de la educación, promoviendo análisis críticos aplicables a la práctica educativa.',
                'cursos' => [
                    'E-Learning en Enseñanza y Aprendizaje Virtual',
                    'Conducta Adolescente y Factores de Riesgo',
                    'Sociología de la Educación',
                    'Economía II',
                    'Inglés III',
                    'Práctica Preprofesional Pedagógica II',
                ],
            ],
            [
                'ciclo' => 'Ciclo VII',
                'descripcion' => 'Integrar historia local, geopolítica y filosofía con la práctica pedagógica, desarrollando habilidades investigativas y propuestas transformadoras en entornos educativos.',
                'cursos' => [
                    'Historia Local y Regional',
                    'Geopolítica',
                    'Filosofía Antigua y Media',
                    'Teorías de la Personalidad',
                    'Electivo I',
                    'Práctica Preprofesional Pedagógica III',
                ],
            ],
            [
                'ciclo' => 'Ciclo VIII',
                'descripcion' => 'Fortalecer competencias en currículo, filosofía moderna y evaluación de proyectos educativos, utilizando metodologías colaborativas para promover la innovación en la enseñanza de las ciencias sociales.',
                'cursos' => [
                    'Filosofía Moderna',
                    'Currículo General',
                    'Educación Sexual y ETS',
                    'Electivo II',
                    'Práctica Preprofesional Pedagógica IV',
                ],
            ],
            [
                'ciclo' => 'Ciclo IX',
                'descripcion' => 'Consolidar el aprendizaje aplicado mediante programación curricular, problemas de aprendizaje, investigación y prácticas pedagógicas avanzadas.',
                'cursos' => [
                    'Programación y Diversificación Curricular en Educación Secundaria',
                    'Problemas de Aprendizaje',
                    'Electivo III',
                    'Seminario de Tesis',
                    'Práctica Preprofesional Pedagógica V',
                ],
            ],
            [
                'ciclo' => 'Ciclo X',
                'descripcion' => 'Culminar la formación mediante evaluación en línea, trabajo de investigación y práctica profesional final, articulando teoría, investigación y praxis pedagógica.',
                'cursos' => [
                    'Programación Curricular y Estrategias de Evaluación en Línea',
                    'Trabajo de Investigación',
                    'Práctica Preprofesional Pedagógica VI',
                ],
            ],
            [
                'ciclo' => 'Cursos electivos',
                'descripcion' => 'El estudiante elige entre estas asignaturas para completar Electivo I, II y III.',
                'cursos' => [
                    'Geografía y Desarrollo Sostenible',
                    'Antropología Cultural y Diversidad en el Perú',
                    'Patrimonio Cultural y Turismo Educativo',
                    'Política y Gobernabilidad en el Perú',
                    'Historia del Arte y Cultura Visual como Herramienta Educativa',
                    'Desarrollo Neurocognitivo del Niño',
                ],
            ],
        ];
    }

    /**
     * @return list<array<string, mixed>>
     */
    private function certificacionesPrimaria(): array
    {
        return [
            [
                'titulo' => 'Primera certificación',
                'nombre' => 'Asistencia Pedagógica y Acompañamiento Escolar en Educación Primaria',
                'ciclo' => 'VI ciclo',
                'requisitos' => "Haber aprobado los créditos y horas correspondientes a las experiencias curriculares vinculadas a las competencias específicas del programa de estudios de Educación Primaria.\n\nSustentar una experiencia pedagógica desarrollada durante las prácticas preprofesionales, evidenciando competencias para el acompañamiento educativo y apoyo en la gestión del aula.",
                'cursos' => [
                    ['codigo' => 'DP303', 'tipo' => 'ES', 'asignatura' => 'Problemas de Aprendizaje en los Niños I', 'creditos' => '4', 'horas' => '80'],
                    ['codigo' => 'DP403', 'tipo' => 'ES', 'asignatura' => 'Problemas de Aprendizaje en los Niños II', 'creditos' => '4', 'horas' => '80'],
                    ['codigo' => 'DP504', 'tipo' => 'ES', 'asignatura' => 'Teoría del Desarrollo de Jean Piaget', 'creditos' => '4', 'horas' => '64'],
                    ['codigo' => 'ED502', 'tipo' => 'EE', 'asignatura' => 'Inteligencia Artificial en Educación', 'creditos' => '4', 'horas' => '80'],
                    ['codigo' => 'PE505', 'tipo' => 'ES', 'asignatura' => 'Práctica Preprofesional Pedagógica I', 'creditos' => '4', 'horas' => '96'],
                    ['codigo' => 'PE606', 'tipo' => 'ES', 'asignatura' => 'Práctica Preprofesional Pedagógica II', 'creditos' => '4', 'horas' => '96'],
                    ['codigo' => 'DP102', 'tipo' => 'ES', 'asignatura' => 'Desarrollo Físico y Cognoscitivo de la Niñez Temprana', 'creditos' => '5', 'horas' => '96'],
                    ['codigo' => 'DP202', 'tipo' => 'ES', 'asignatura' => 'Desarrollo Psicosocial en la Niñez Temprana', 'creditos' => '4', 'horas' => '80'],
                ],
                'competencias' => [
                    'Apoya en la organización y acompañamiento de los procesos de enseñanza-aprendizaje en Educación Primaria.',
                    'Aplica estrategias básicas de tutoría, convivencia escolar y atención a la diversidad en contextos educativos.',
                    'Colabora en la gestión del aula promoviendo ambientes seguros, inclusivos y favorables para el aprendizaje.',
                    'Participa en actividades pedagógicas y formativas orientadas al desarrollo integral de los estudiantes.',
                ],
                'perfil_salida' => 'El estudiante demuestra competencias para desempeñarse como auxiliar o asistente pedagógico en instituciones educativas del nivel primario, participando en el acompañamiento de estudiantes, apoyo a la gestión del aula, promoción de la convivencia escolar y desarrollo de actividades pedagógicas en instituciones educativas públicas y privadas.',
            ],
            [
                'titulo' => 'Segunda certificación',
                'nombre' => 'Gestión de Procesos Pedagógicos e Innovación Educativa en Educación Primaria',
                'ciclo' => 'IX ciclo',
                'requisitos' => "Haber aprobado los créditos y horas correspondientes a las experiencias curriculares vinculadas a las competencias específicas del programa de estudios de Educación Primaria.\n\nSustentar un proyecto de innovación pedagógica desarrollado durante las prácticas preprofesionales, evidenciando competencias para la planificación, ejecución y evaluación de procesos educativos en el nivel primario.",
                'cursos' => [
                    ['codigo' => 'DP704', 'tipo' => 'ES', 'asignatura' => 'Educación Inclusiva para Niños de Primaria', 'creditos' => '4', 'horas' => '64'],
                    ['codigo' => 'DP605', 'tipo' => 'ES', 'asignatura' => 'Didáctica de la Matemática en Primaria II', 'creditos' => '3', 'horas' => '64'],
                    ['codigo' => 'DP703', 'tipo' => 'ES', 'asignatura' => 'Didáctica de las Ciencias Naturales en Primaria II', 'creditos' => '3', 'horas' => '64'],
                    ['codigo' => 'ED702', 'tipo' => 'EE', 'asignatura' => 'Didáctica de la Comunicación para Niños', 'creditos' => '4', 'horas' => '80'],
                    ['codigo' => 'PE705', 'tipo' => 'ES', 'asignatura' => 'Práctica Preprofesional Pedagógica III', 'creditos' => '5', 'horas' => '128'],
                    ['codigo' => 'DP802', 'tipo' => 'ES', 'asignatura' => 'Taller de Canto en Niños de Educación Primaria', 'creditos' => '3', 'horas' => '64'],
                    ['codigo' => 'ED902', 'tipo' => 'ES', 'asignatura' => 'Programación y Diversificación Curricular en Educación Primaria', 'creditos' => '3', 'horas' => '64'],
                    ['codigo' => 'PE804', 'tipo' => 'ES', 'asignatura' => 'Práctica Preprofesional Pedagógica IV', 'creditos' => '7', 'horas' => '192'],
                    ['codigo' => 'PE903', 'tipo' => 'ES', 'asignatura' => 'Práctica Preprofesional Pedagógica V', 'creditos' => '7', 'horas' => '192'],
                ],
                'competencias' => [
                    'Planifica y desarrolla procesos de enseñanza-aprendizaje considerando enfoques pedagógicos, inclusivos e interculturales.',
                    'Diseña estrategias didácticas y recursos educativos orientados al desarrollo integral de estudiantes de Educación Primaria.',
                    'Evalúa aprendizajes y propone acciones de mejora continua en contextos educativos diversos.',
                    'Integra tecnologías educativas y metodologías innovadoras en el desarrollo de experiencias de aprendizaje.',
                    'Participa en proyectos pedagógicos y actividades institucionales promoviendo liderazgo, trabajo colaborativo y compromiso ético.',
                ],
                'perfil_salida' => 'El estudiante demuestra competencias pedagógicas, didácticas y de gestión educativa para desempeñarse en instituciones educativas del nivel primario, participando en procesos de planificación, desarrollo y evaluación de aprendizajes, así como en propuestas de innovación educativa orientadas a la mejora de la calidad educativa.',
            ],
        ];
    }

    /**
     * @return list<array<string, mixed>>
     */
    private function certificacionesCienciasSociales(): array
    {
        return [
            [
                'titulo' => 'Primera certificación',
                'nombre' => 'Asistencia Pedagógica y Acompañamiento Escolar en Educación Secundaria',
                'ciclo' => 'VI ciclo',
                'requisitos' => "Haber aprobado los créditos y horas correspondientes a las experiencias curriculares vinculadas a las competencias específicas del programa de estudios de Educación Secundaria con mención en Ciencias Sociales.\n\nSustentar una experiencia pedagógica desarrollada durante las prácticas preprofesionales, evidenciando competencias para el acompañamiento educativo y apoyo en la gestión del aula.",
                'cursos' => [
                    ['codigo' => 'EG102', 'tipo' => 'EE', 'asignatura' => 'Pedagogía General', 'creditos' => '4', 'horas' => '64'],
                    ['codigo' => 'ECS410', 'tipo' => 'ES', 'asignatura' => 'Realidad Nacional y Derechos Humanos', 'creditos' => '4', 'horas' => '64'],
                    ['codigo' => 'EG103', 'tipo' => 'EE', 'asignatura' => 'Psicología General', 'creditos' => '4', 'horas' => '64'],
                    ['codigo' => 'PE505', 'tipo' => 'ES', 'asignatura' => 'Práctica Preprofesional Pedagógica I', 'creditos' => '4', 'horas' => '96'],
                    ['codigo' => 'ECS619', 'tipo' => 'ES', 'asignatura' => 'Conducta Adolescente y Factores de Riesgo', 'creditos' => '3', 'horas' => '64'],
                    ['codigo' => 'ECS620', 'tipo' => 'ES', 'asignatura' => 'Sociología de la Educación', 'creditos' => '3', 'horas' => '64'],
                    ['codigo' => 'PE606', 'tipo' => 'ES', 'asignatura' => 'Práctica Preprofesional Pedagógica II', 'creditos' => '4', 'horas' => '128'],
                ],
                'competencias' => [
                    'Apoya en el acompañamiento pedagógico y desarrollo de actividades educativas en instituciones de Educación Secundaria.',
                    'Participa en la gestión del aula promoviendo ambientes de convivencia democrática e inclusión educativa.',
                    'Aplica estrategias básicas de orientación y acompañamiento a estudiantes adolescentes.',
                    'Colabora en el desarrollo de actividades pedagógicas y formativas en contextos educativos diversos.',
                ],
                'perfil_salida' => 'El estudiante demuestra competencias para desempeñarse como auxiliar o asistente pedagógico en instituciones educativas del nivel secundario, participando en el acompañamiento de estudiantes, apoyo a la gestión del aula y desarrollo de actividades formativas y pedagógicas.',
            ],
            [
                'titulo' => 'Segunda certificación',
                'nombre' => 'Gestión Pedagógica e Innovación Educativa en Ciencias Sociales',
                'ciclo' => 'IX ciclo',
                'requisitos' => "Haber aprobado los créditos y horas correspondientes a las experiencias curriculares vinculadas a las competencias específicas del programa de estudios de Educación Secundaria con mención en Ciencias Sociales.\n\nSustentar un proyecto de innovación pedagógica desarrollado durante las prácticas preprofesionales, evidenciando competencias para la planificación, ejecución y evaluación de procesos educativos en Educación Secundaria.",
                'cursos' => [
                    ['codigo' => 'ECS721', 'tipo' => 'ES', 'asignatura' => 'Historia Local y Regional', 'creditos' => '3', 'horas' => '64'],
                    ['codigo' => 'ECS722', 'tipo' => 'ES', 'asignatura' => 'Geopolítica', 'creditos' => '3', 'horas' => '64'],
                    ['codigo' => 'ED714', 'tipo' => 'EE', 'asignatura' => 'Filosofía Antigua y Media', 'creditos' => '4', 'horas' => '64'],
                    ['codigo' => 'PE705', 'tipo' => 'ES', 'asignatura' => 'Práctica Preprofesional Pedagógica III', 'creditos' => '5', 'horas' => '192'],
                    ['codigo' => 'ECS813', 'tipo' => 'ES', 'asignatura' => 'Filosofía Moderna', 'creditos' => '4', 'horas' => '64'],
                    ['codigo' => 'ECS814', 'tipo' => 'ES', 'asignatura' => 'Currículo General', 'creditos' => '4', 'horas' => '64'],
                    ['codigo' => 'PE804', 'tipo' => 'ES', 'asignatura' => 'Práctica Preprofesional Pedagógica IV', 'creditos' => '7', 'horas' => '192'],
                    ['codigo' => 'ED906', 'tipo' => 'ES', 'asignatura' => 'Programación y Diversificación Curricular en Educación Secundaria', 'creditos' => '3', 'horas' => '48'],
                    ['codigo' => 'ED908', 'tipo' => 'EE', 'asignatura' => 'Problemas de Aprendizaje', 'creditos' => '3', 'horas' => '64'],
                    ['codigo' => 'PE903', 'tipo' => 'ES', 'asignatura' => 'Práctica Preprofesional Pedagógica V', 'creditos' => '7', 'horas' => '192'],
                    ['codigo' => 'PE1002', 'tipo' => 'ES', 'asignatura' => 'Práctica Preprofesional Pedagógica VI', 'creditos' => '7', 'horas' => '192'],
                ],
                'competencias' => [
                    'Planifica y desarrolla procesos de enseñanza-aprendizaje en el área de Ciencias Sociales considerando enfoques pedagógicos, inclusivos e interculturales.',
                    'Diseña estrategias didácticas orientadas al desarrollo del pensamiento crítico, ciudadanía y comprensión de la realidad social.',
                    'Gestiona procesos curriculares y propuestas pedagógicas contextualizadas para Educación Secundaria.',
                    'Evalúa aprendizajes utilizando estrategias e instrumentos pertinentes en entornos presenciales y virtuales.',
                    'Participa en proyectos pedagógicos e institucionales promoviendo liderazgo, convivencia democrática y compromiso ético.',
                ],
                'perfil_salida' => 'El estudiante demuestra competencias pedagógicas, didácticas y de gestión educativa para desempeñarse en instituciones educativas del nivel secundario en el área de Ciencias Sociales, participando en procesos de planificación, desarrollo y evaluación de aprendizajes, así como en propuestas de innovación educativa orientadas al fortalecimiento de la calidad educativa.',
            ],
        ];
    }
};
